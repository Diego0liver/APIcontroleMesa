<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mesas;
use Illuminate\Http\Request;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getMesas = Mesas::all();
        return $getMesas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $getIdMesa = Mesas::find($id);
        if($getIdMesa){
           //pegando o testamento com os livros pela n:1
           $response = [
              'Mesa' => $getIdMesa,
              'Cardapios'=> $getIdMesa->cardapios
           ];
            return $getIdMesa;
          }
          return response()->json([
             'message' => 'Algo deu errado :('
            ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateItem = Mesas::find($id);
        if($updateItem){
            $updateItem->update($request->all());
            return $updateItem;
        }
        return response()->json([
                'erro'=>'error :c'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
