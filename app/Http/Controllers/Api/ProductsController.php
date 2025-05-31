<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsController extends Controller
{

    protected $model;

    public function __construct(Products $model)
    {   
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = $this->model->all();

        if($product->isEmpty()) {
            return response()->json([
                'message' => 'Nao a registro no banco'
            ], 404);
        }

        return response()->json($product);
    }

    
    public function save(Request $request)
    {
        $product = $this->model->create($request->all());
        
        return response()->json([
            'message' => "Produto cadastrado com success",
            'praduct' => $product
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = $this->model->find($id);
     
        $product = $this->model->update($request->all());
        
        return response()->json(['message' => "Produto atualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->model->find($id);
        $product->delete();

        return response()->json(['message' => 'Produo deletado']);
    }
}
