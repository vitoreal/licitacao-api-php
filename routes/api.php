<?php

use App\Http\Controllers\Licitacao\ImportarLicitacaoController;
use App\Http\Controllers\Licitacao\ListarLicitacaoController;
use App\Http\Controllers\Licitacao\VisualizadoLicitacaoController;
use Illuminate\Support\Facades\Route;

Route::get('/licitacao', ListarLicitacaoController::class);
Route::get('/licitacao/importacao', ImportarLicitacaoController::class);
Route::put('/licitacao/{id}/visualizada', VisualizadoLicitacaoController::class);

// Swagger
Route::get('/docs', function () {
    return redirect('/swagger-ui/index.html');
});
