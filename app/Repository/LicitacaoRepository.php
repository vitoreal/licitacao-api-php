<?php

namespace App\Repository;

use Carbon\Carbon;
use Illuminate\Http\Request;

class LicitacaoRepository extends AbstractRepository {

    public function buscarLicitacao(Request $request){
        
        $uasg = $request->query('codigo_uasg');
        $pregao = $request->query('numero_pregao');
       
        $query = $this->model;
        
        if (!empty($uasg)) {
            $query = $query->where('codigo_uasg', '=', "{$uasg}");
        }

        if (!empty($pregao)) {
            $query = $query->where('numero_pregao', '=', "{$pregao}");
        }
        
        $result = $query->paginate(5);

        // Transforma os campos dos itens paginados
        $result->getCollection()->transform(function ($item) {
            $item->visualizada = (bool) $item->visualizada;
            if(!empty($item->data_proposta)) {
                $item->data_proposta = Carbon::parse($item->data_proposta)->format('d/m/Y');
            }
           
            return $item;
        });

        return $result;

    }

    public function verificarExisteLicitacao($codigoUASG){
        $total = $this->model->where('codigo_uasg', $codigoUASG)->count();
        return $total;
    }

}