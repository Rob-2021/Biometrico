<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index(Request $request)
    {
        $query = Dispositivo::query();
        $busqueda = $request->input('busqueda');
        if ($busqueda) {
            $query->where(function ($q) use ($busqueda) {
                $q->where('IPAddress', 'like', "%$busqueda%")
                    ->orWhere('Descripcion', 'like', "%$busqueda%");
            });
        }
        $dispositivos = $query->orderByDesc('IdDispositivo')->paginate(20)->withQueryString();
        return view('biometrico.dispositivo', compact('dispositivos', 'busqueda'));
    }
}
