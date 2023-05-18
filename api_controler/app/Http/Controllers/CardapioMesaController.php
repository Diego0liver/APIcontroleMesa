<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CardapioMesa;
use Illuminate\Http\Request;

class CardapioMesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $getPivo = CardapioMesa::all();
         return $getPivo;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $creatItem = CardapioMesa::create($request->all());
        if($creatItem){
            return response()->json([
                'mensagem'=>'Item adicionado com sucesso'
            ], 200);
        }
        return response()->json([
             'erro'=>'Erro :c'
        ],404);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
