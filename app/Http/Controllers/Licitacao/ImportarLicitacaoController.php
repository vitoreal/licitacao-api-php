<?php

namespace App\Http\Controllers\Licitacao;

use App\Http\Controllers\Controller;
use App\Services\ImportacaoService;
use Exception;
use Illuminate\Http\Response;

class ImportarLicitacaoController extends Controller
{
    
    private ImportacaoService $service;

    public function __construct(ImportacaoService $service) {
        $this->service = $service;
    }

    public function __invoke()
    {
        try {
            
            $this->service->importarLicitacoes();
            return response()->json(['message' => 'Importação realizada com sucesso!'], Response::HTTP_OK);

        } catch (Exception $e) {
            $error = ['message' => 'Algum erro aconteceu!', 'error' => $e->getMessage()];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

}
