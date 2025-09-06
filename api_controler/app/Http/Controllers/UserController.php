<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('uploads', 'local');

        $user = Auth::user();
        $user->avatar = $path;
        $user->save();

        return response()->json([
            'message' => 'Arquivo enviado com sucesso!',
            'path' => $path,
            'url' => asset('storage/' . str_replace('user-avatar/', '', $path))
        ]);
    }
}
