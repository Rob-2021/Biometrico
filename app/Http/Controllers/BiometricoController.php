<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jmrashed\Zkteco\Lib\ZKTeco;

class BiometricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $zk = new ZKTeco('10.1.71.6');
        $registros = [];
        $fecha = $request->input('fecha');
        $mes = $request->input('mes');
        try {
            if ($zk->connect()) {
                $attendanceLog = $zk->getAttendance();

                // Filtrar por fecha o mes
                if ($fecha) {
                    $registros = array_filter($attendanceLog, function($record) use ($fecha) {
                        return isset($record['timestamp']) && substr($record['timestamp'], 0, 10) === $fecha;
                    });
                } elseif ($mes) {
                    $registros = array_filter($attendanceLog, function($record) use ($mes) {
                        return isset($record['timestamp']) && substr($record['timestamp'], 0, 7) === $mes;
                    });
                } else {
                    // Por defecto, mostrar los de hoy
                    $todayDate = date('Y-m-d');
                    $registros = array_filter($attendanceLog, function($record) use ($todayDate) {
                        return isset($record['timestamp']) && substr($record['timestamp'], 0, 10) === $todayDate;
                    });
                }
                $zk->disconnect();
            }
        } catch (\Exception $e) {
            $registros = [];
        }
        return view('biometrico.index', compact('registros', 'fecha', 'mes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Mostrar todos los usuarios del dispositivo.
     */
    public function usuarios()
    {
        $zk = new ZKTeco('10.1.71.6');
        $usuarios = [];
        try {
            if ($zk->connect()) {
                $usuarios = $zk->getUser();
                $zk->disconnect();
            }
        } catch (\Exception $e) {
            $usuarios = [];
        }
        return view('biometrico.usuarios', compact('usuarios'));
    }
}
