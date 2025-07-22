<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Jmrashed\Zkteco\Lib\ZKTeco;

class BiometricoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zk = new ZKTeco('10.1.71.6');
        //$zk = new ZKTeco('10.250.13.79');
        $registros = [];
        try {
            if ($zk->connect()) {
                // Obtener solo los registros de hoy
                if (method_exists($zk, 'getTodaysRecords')) {
                    $registros = $zk::getTodaysRecords($zk);
                } else {
                    $attendanceLog = $zk->getAttendance();
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
        return view('biometrico.index', compact('registros'));
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
}
