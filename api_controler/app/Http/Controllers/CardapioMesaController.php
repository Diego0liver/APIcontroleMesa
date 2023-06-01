<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cardapio;
use App\Models\CardapioMesa;
use App\Models\Mesas;
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
    public function destroy(string $mesas_id, string $cardapio_id)
    {

        $seusDados = CardapioMesa::where('mesas_id', $mesas_id)->first();
        $seusDados2 = CardapioMesa::where('cardapio_id', $cardapio_id)->first();

        if ($seusDados && $seusDados2) {
            $seusDados->delete();
            return response()->json(['message' => 'Registro excluído com sucesso']);
        } else {
            return dd($seusDados);
        }

        }



        public function destroyTotalMesa(string $mesas_id)


            {
                try {
                    // Localize o aluno pelo aluno_id
                    $aluno = Mesas::find($mesas_id);

                    if (!$aluno) {
                        throw new \Exception('Aluno não encontrado.');
                    }

                    // Acesse a relação "notas" definida no modelo Aluno e exclua todas as notas
                    $aluno->cardapios()->detach();

                    return response()->json(['message' => 'Notas excluídas com sucesso.']);

                } catch (\Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            }


}



