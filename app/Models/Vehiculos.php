<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;

    protected $table = 'vehiculos_tbl';

    protected $fillable = [
        'vehiculo',
        'created_at',
        'updated_at'

    ];
}
