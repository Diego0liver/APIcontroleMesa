<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getIntes = Cardapio::get();
        return $getIntes;
    }

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
}
