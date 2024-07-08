<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserService
{

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getAll() {
        return User::get();
    }

    public function store(Request $request){
        User::create($request->all());
    }

    public function validate(Request $request){
        $usuario = User::where('idUsuario', $request->input('idUsuario'))->first();

        // if (!$usuario){
        //     return redirect()->route('user.login')->withErrors(['error' => 'id não registrado']);
        // }

        // if (!password_verify($request->input('password'), $usuario->password)){
        //     return redirect()->route('user.login')->withErrors(['error' => 'senha incorreta']);
        // }
        if (($usuario) && (password_verify($request->input('password'), $usuario->password))){
            return true;
        }
        else {
            return false;
        }
    }
}
