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
        'monto_a_cobrar_general',
        'mode',
        'creado_por',
        'fecha_despacho',
        'debud_request'
    ];

    public function productos()
    {
        return $this->hasMany(RutasProductos::class, 'id_rutas_tbl');
    }
}
