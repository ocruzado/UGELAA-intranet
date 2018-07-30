<?php

namespace HelpDesk\Http\Controllers;

use HelpDesk\Http\Requests\StoreUsuarioRequest;
use HelpDesk\Model\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['login']]);
    }

    public function register(StoreUsuarioRequest $request)
    {
        $obj = Usuario::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'success' => true,
            'data' => $obj,
            'message' => 'usuario creado correctamente'
        ]);
    }

    public function login(Request $request)
    {
//        $credentials = $request->only('email', 'password');
//        $credentials = $request->only('usuario', 'clave');

//        if (!Auth::attempt($credentials)) {
        if (!Auth::attempt(['email' => $request->usuario, 'password' => $request->clave])) {
            return response()->json([
                'success' => false,
                'message' => 'usuario ó clave invalidos',
            ], 401);
        } else {
            return response()->json([
                'success' => true,
                'data' => url('dashboard'),
                'message' => 'session inicada correctamente'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'success' => true,
            'data' => url('/'),
            'message' => 'sessión finalizada correctamente'
        ]);
    }
}