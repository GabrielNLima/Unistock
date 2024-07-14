<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntradasController extends Controller
{
    public function index(){

        // $entradas = $this->entradasService->getAll();

        return inertia('Entradas/Index', [
            'entradas' => $entradas]);
    }
}
