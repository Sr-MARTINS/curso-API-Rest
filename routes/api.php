<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function (Request $request) {

    // dd($request->headers->all());

    return ['msg' => 'Minha primeira resposta de API'];
});


Route::get('/products', [ProductsController::class, 'index']);