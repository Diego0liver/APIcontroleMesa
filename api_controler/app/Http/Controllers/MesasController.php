<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mesas;
use Illuminate\Http\Request;

class MesasController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mesaCreat = Mesas::create($request->all());
        return $mesaCreat;
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
        $mesaDelet = Mesas::destroy($id);
        return $mesaDelet;
    }


    public function getId($id)
{
    $contacts = Mesas::where('user_id', $id)->get();

    if ($contacts->isEmpty()) {
        return response()->json('Usuário não encontrado ou não possui contatos.', 404);
    }

    return response()->json($contacts);
}
}
