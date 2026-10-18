<?php

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
=======
use App\Http\Controllers\Api\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/produtos', ProdutoController::class);

/* 
    GET     /api/produtos
    POST    /api/produtos
    GET     /api/produtos/id
    PUT     /api/produtos/id
    DELETE  /api/produtos/id

*/
>>>>>>> repositorio-professor/main
