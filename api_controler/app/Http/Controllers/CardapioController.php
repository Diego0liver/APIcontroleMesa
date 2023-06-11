<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produtosCreat = Cardapio::create($request->all());
       return $produtosCreat;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produtosGetId = Cardapio::findOrFail($id);
        return $produtosGetId;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produtoDelet = Cardapio::destroy($id);
        return $produtoDelet;
    }

    public function getIdCardapio($id)
    {
        $contacts = Cardapio::where('user_id', $id)->get();

        if ($contacts->isEmpty()) {
            return response()->json('Usuário não encontrado ou não possui contatos.', 404);
        }

        return response()->json($contacts);
    }
}
