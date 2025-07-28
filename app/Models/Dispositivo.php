<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table = 'DispositivosControlAsistencia';
    protected $primaryKey = 'IdDispositivo';
    public $timestamps = false;
    protected $connection = 'sqlsrv';
    protected $fillable = [
        'idSitio',
        'IPAddress',
        'Descripcion',
        'Ubicacion',
        'CodigoUsuario',
        'FechaHoraRegistro',
        'CodigoEdificioSICAU',
        'Estado',
    ];
}
