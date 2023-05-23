<?php

namespace App\Exports;

use App\Models\Rutas;
use App\Models\RutasProductos;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class RutasExport implements FromCollection, WithMapping,WithHeadings
{
    private $userId;
    public function __construct($userId)
    {
        $this->userId = $userId;
    }
    /**
    * @return \Illuminate\Support\Collection
    */



    public function collection()
    {

        $data = DB::table('rutas_tbl')
            ->select('rutas_tbl.*')
            ->where('rutas_tbl.creado_por',$this->userId)
            ->get();
        return $data;
    }
    public function headings(): array
    {
        return [
            'No. Guia',
            'Vehiculo',
            'Nombre de contacto',
            'Dirección de contacto',
            'Sucursal',
            'Fecha de despacho',
            'Fecha de registro'
        ];
    }
    public function map($export): array
    {

        return [
            $export->numero_guia,
            $export->vehiculo,
            $export->nombre_contact,
            $export->direccion_contact,
            $export->sucursal,
            $export->fecha_despacho,
            $export->created_at
        ];
    }
}
