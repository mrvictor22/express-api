<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    use HasFactory;
    protected $table = 'rutas_tbl';

    protected $fillable = [
        'numero_guia',
        'vehiculo',
        'nombre_contact',
        'phn_contact',
        'email_contact',
        'direccion_contact',
        'sucursal',
        'mode',
        'creado_por',
        'fecha_despacho',
        'debud_request'
    ];
}
