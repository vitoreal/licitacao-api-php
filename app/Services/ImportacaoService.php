<?php

namespace App\Services;

use App\Models\Licitacao;
use App\Repository\LicitacaoRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;

class ImportacaoService {


    private LicitacaoRepository $repository;

    public function __construct(Licitacao $model){
        $this->repository = new LicitacaoRepository($model);
    }

    public function importarLicitacoes(): void
    {
        $html = $this->obterPaginaLicitacoes();

        $crawler = new Crawler($html);

        $crawler->filter('table td')->each(function (Crawler $td) {
            $html = $td->html();

            if (!Str::contains($html, 'Código da UASG:')) {
                return;
            }

            try {
                $licitacao = $this->parseBlocoHtml($html);

                if (!$licitacao || !$licitacao->codigo_uasg) {
                    return;
                }

                // Verifica se a licitação já existe com base na UASG e número do pregão
                $existe = $this->repository->verificarExisteLicitacao(
                    $licitacao->codigo_uasg,
                );

                if (!$existe) {
                   $this->repository->salvar($licitacao);
                }

            } catch (\Throwable $e) {
                throw new Exception($e->getMessage());
            }
        });
    }


    private function parseBlocoHtml(string $html): ?Licitacao
    {
        // Quebra por <br> e limpa
        $lines = array_values(array_filter(array_map('trim', explode('<br>', $html))));

        if (count($lines) < 5) return null;

        // Limpeza para facilitar o regex
        $html = strip_tags(str_ireplace(['<br>', '&nbsp;'], ["\n", ' '], $html), '<a><input>');

        // Limpeza e extração básica
        preg_match('/Código da UASG:\s*(\d+)/', $html, $uasgMatch);
        preg_match('/Pregão Eletrônico Nº\s*([0-9\/]+)/', $html, $pregaoMatch);
        preg_match('/Objeto:\s*Pregão Eletrônico\s*-\s*(.+?)\n/i', $html, $objetoMatch);
        preg_match('/Entrega da Proposta:\s*\x{00A0}?\s*([0-9\/]+)\s+às\s+([0-9]{2}:[0-9]{2})Hs/iu', $html, $entregaMatch);
        preg_match('/Licitações\s*\(\d+\s*-\s*\d+\s*de\s*(\d+)\)/', $html, $totalMatch);

        $licitacao = new Licitacao();
        $licitacao->codigo_uasg = $uasgMatch[1] ?? null;
        $licitacao->numero_pregao = $pregaoMatch[1] ?? null;
        $licitacao->objeto = $objetoMatch[1] ?? null;

        if (!empty($entregaMatch)) {
            $data = $entregaMatch[1]; // Ex: 02/06/2025
            $hora = $entregaMatch[2]; // Ex: 09:00
            $dataHora = Carbon::createFromFormat('d/m/Y H:i', "$data $hora");
            $licitacao->data_proposta = $dataHora;
        }

        return $licitacao;
    }

    private function obterPaginaLicitacoes(): string
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'http://comprasnet.gov.br/ConsultaLicitacoes/ConsLicitacaoDia.asp');
        $html = $response->getContent();
        return $html;
        //return mb_convert_encoding($html, 'HTML-ENTITIES', 'ISO-8859-1');
    }

}