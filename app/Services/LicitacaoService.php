<?php

namespace App\Services;

use App\Models\Licitacao;
use App\Repository\LicitacaoRepository;
use Illuminate\Http\Request;

class LicitacaoService {

    private LicitacaoRepository $repository;

    public function __construct(Licitacao $model){
        $this->repository = new LicitacaoRepository($model);
    }

    public function buscarLicitacao(Request $request){
        return $this->repository->buscarLicitacao($request);
    }

    public function buscarPorId($id){
        $result = $this->repository->buscarPorId($id);
        return $result;
    }

    public function salvar($model){
        $result = $this->repository->salvar($model);
        return $result;
    }

}