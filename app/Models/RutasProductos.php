<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutasProductos extends Model
{
    use HasFactory;

    protected $table = 'producto_rutas_tbl';

    protected $fillable = [
        'id_rutas_tbl',
        'nombre_prod',
        'cant_prod',
        'cod_prod'

    ];
    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_rutas_tbl');
    }
}
