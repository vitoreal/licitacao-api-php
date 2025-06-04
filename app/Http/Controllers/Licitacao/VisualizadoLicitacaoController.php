<?php

namespace App\Http\Controllers\Licitacao;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Services\LicitacaoService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\isNull;

class VisualizadoLicitacaoController extends Controller
{
    
    private LicitacaoService $service;

    public function __construct(LicitacaoService $service) {
        $this->service = $service;
    }

    public function __invoke(Request $request, $id)
    {

         try {

            $licitacao = $this->service->buscarPorId($id);

            if(is_null($licitacao)) {
                throw new NotFoundException();
            }
            
            $licitacao['visualizada'] = filter_var($request->visualizada, FILTER_VALIDATE_BOOLEAN);

            $result = $this->service->salvar($licitacao);
    
            if($result){
                return response()->json([
                    'message' => 'Solicitação realizada com sucesso.',
                    'data' => $result
                ]);
            } else {
                throw new NotFoundException();
            }

        } catch (Exception $e) {
            $error = ['message' => $e->getMessage()];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

}
