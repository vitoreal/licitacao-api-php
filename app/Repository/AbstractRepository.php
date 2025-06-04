<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function findAll()
    {
        $this->model = $this->model->all();
        return  $this->model;
    }

    public function salvar($request)
    {
        $resposta = $request->save();
        return $resposta; // true or false
    }

    public function buscarPorId($id)
    {
        $this->model = $this->model->find($id);
        return $this->model;
    }

}
