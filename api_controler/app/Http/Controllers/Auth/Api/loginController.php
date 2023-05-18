<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
     public function login(Request $request)
    {
        $credencial = $request->only('email', 'password');
        if(!auth()->attempt($credencial))abort(401, 'nao autorizado') ;

        $token = auth()->user()->createToken('controleMesa_token');
        return response()->json([
            'data'=>[
                'token' => $token->plainTextToken
            ]
            ]);
    }



    public function registro(Request $request, User $user)
    {
        $useData = $request->only('name', 'email', 'password');
        $useData['password'] = bcrypt($useData['password']);
        if(!$user = $user->create($useData))
        abort(500, 'Error 404');

        return response()->json([
            'data'=>[
                'user' => $user
            ]
            ]);
    }
}