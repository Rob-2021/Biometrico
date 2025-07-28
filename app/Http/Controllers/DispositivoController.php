<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->has('desconectar')) {
                session()->forget('ip_biometrico');
                return redirect()->route('biometrico.index');
            }
            $ip = $request->input('ip', '10.1.71.6');
            $existe = Dispositivo::where('IPAddress', $ip)->exists();
            if ($existe) {
                session(['ip_biometrico' => $ip]);
            } else {
                session()->forget('ip_biometrico');
            }
            return redirect()->route('biometrico.index');
        }
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
