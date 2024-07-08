<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        return Inertia::render('Users/Index');
    }

    public function store(Request $request){
        //User::create($request->all());

        $this->userService->store($request);
        return redirect()->route('user.login');
    }

    public function login(){
        return inertia('Auth/Login');
    }

    public function validates(Request $request){
        // $user = User::where('idUsuario', $request->input('idUsuario'))->first();
        // if (!$user){
        //     return redirect()->route('user.login')->withErrors(['error' => 'id não registrado']);
        // }
        // if (!password_verify($request->input('password'), $user->password)){
        //     return redirect()->route('user.login')->withErrors(['error' => 'senha incorreta']);
        // }

        if ($this->userService->validate($request)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('user.login')->withErrors(['error' => 'id ou senha incorretos!']);
        }
    }

    public function register (){
        return Inertia::render('Auth/Register');
    }

    public function dashboard(){
        return Inertia::render('Dashboard');
    }

}

?>
