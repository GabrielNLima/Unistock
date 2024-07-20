<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }


    public function login(){
        return inertia('Auth/Login');
    }

    public function register (){
        return Inertia::render('Auth/Register');
    }

    public function store(StoreUserFormRequest $request){
        //User::create($request->all());

        $this->userService->store($request);
        return redirect()->route('user.login');
    }

    public function dashboard(){
        return Inertia::render('Dashboard');
    }

    public function validates(Request $request){
        if ($this->userService->validate($request)){
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('user.login')->withErrors(['error' => 'id ou senha incorretos!']);
        }
    }

}

?>
