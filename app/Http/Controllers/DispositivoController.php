<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index()
    {
        $dispositivos = Dispositivo::orderByDesc('IdDispositivo')->limit(1000)->get();
        return view('biometrico.dispositivo', compact('dispositivos'));
    }
}
