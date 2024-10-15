<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class BautizoController extends Controller
{
    public function create()
    {
        // Recuperar todos los departamentos desde la base de datos
        $departamentos = Departamento::all();
        
        // Pasar los departamentos a la vista
        return view('bautizo-craete-update', compact('departamentos'));
    }
}
