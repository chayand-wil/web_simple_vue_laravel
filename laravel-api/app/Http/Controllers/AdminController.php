<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,ayudante',
    ]);

    $user = User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => bcrypt($request->password),
        'role'     => $request->role,
    ]);

    return response()->json(['message' => 'Usuario creado', 'user' => $user]);
}

public function index()
{
    return User::select('id', 'name', 'email', 'role', 'created_at')->get();
}

public function uniqueUser( $id)
{
    
    $user = User::find($id);
    
    if (!$user) {
        return response()->json(['message' => 'Usuario no encontrado'], 404);
    }

    return $user;
}
 

}
