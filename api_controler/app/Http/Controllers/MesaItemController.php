<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MesaItem;
use Illuminate\Http\Request;

class MesaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getMesaItem = MesaItem::all();
        return $getMesaItem;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
