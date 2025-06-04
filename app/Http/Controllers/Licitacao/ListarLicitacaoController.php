<?php

namespace App\Http\Controllers\Licitacao;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Services\LicitacaoService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ListarLicitacaoController extends Controller
{
    
    private LicitacaoService $service;

    public function __construct(LicitacaoService $service) {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {

         try {

            $result = $this->service->buscarLicitacao($request);
    
            if($result){
                return response()->json($result, Response::HTTP_OK);
            } else {
                throw new NotFoundException();
            }

        } catch (Exception $e) {
            $error = ['message' => 'Algum erro aconteceu!', 'error' => $e->getMessage()];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

}
