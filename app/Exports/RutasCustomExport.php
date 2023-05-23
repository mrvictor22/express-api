<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Rutas;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class RutasCustomExport implements FromCollection,WithMapping,WithHeadings
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $usersToExclude = ['2', '3', '4', '5', '6', '7', '8', '9', '11'];

        $data = DB::table('rutas_tbl')
            ->join('users', 'rutas_tbl.creado_por', '=', 'users.id')
            ->select('rutas_tbl.*',  'users.name')
            ->whereNotIn('rutas_tbl.creado_por', $usersToExclude)
            ->orderBy('rutas_tbl.id', 'desc')
            ->get();

        return $data;
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No. Guia',
            'Creado por usuario',
            'Vehiculo',
            'Nombre de contacto',
            'Telefono de contacto',
            'Email de contacto',
            'Dirección de contacto',
            'Sucursal',
            'Monto a cobrar general',
            'Fecha de despacho'
        ];
    }
    public function map($export): array
    {

        return [
            $export->numero_guia,
            $export->name,
            $export->vehiculo,
            $export->nombre_contact,
            $export->phn_contact,
            $export->email_contact,
            $export->direccion_contact,
            $export->sucursal,
            $export->monto_a_cobrar_general,
            $export->fecha_despacho
        ];
    }
}
