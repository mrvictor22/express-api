@extends('layouts.master')
@section('title')
    QR
@endsection
@section('css')
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            GENERACION
        @endslot
        @slot('title')
            QR
        @endslot
    @endcomponent

<style>
    table, th, td {
        border: 4px solid black;
        border-collapse: collapse;
    }
    .card-body{
        display: flex;
        justify-content: center;
        align-items: center;
        /*padding-left: 25%;*/
    }
    @media print {
        .card-body{
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            /*padding-left: 25%;*/
        }
        table {
            border: 4px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 4px solid black;
            border-collapse: collapse;
        }
        .hidden-print {
            display: none !important;
        }
    }


</style>

<div class="card-body" id="printableArea" >
    <div class="row">
        @if( $id_guia)

            <table class="tg" style="border: 4px solid black;border-collapse: collapse;">
                <thead>
                <tr style="border: 4px solid black; border-collapse: collapse;">
                    <td colspan="2" style="text-align: center; border: 4px solid black;border-collapse: collapse;">
                        <img src="{{ URL::asset('assets/images/ssss.png')}}"  width="255" ></td>
                </tr>
                <tr style="border: 4px solid black;border-collapse: collapse;">

                    <td class="tg-0lax" style="border: 4px solid black;border-collapse: collapse;">
                        <h3>Guia:</h3>
                        <ul>
                            <li>Numero de guia: {{$id_guia}}  </li>
                            <li>Sucursal: {{$sucursal}}  </li>
                            <li>Fecha despacho: {{$fecha_despacho}}  </li>
                        </ul>
                        <h3>Destino:</h3>
                       <ul>

                           <li>Nombre de contacto: {{$nombre_contact}}  </li>
                           <li>Telefono: {{$telefono}}  </li>
                           <li>Dirección: <br>
                               {{$destino}}  </li>

                       </ul>
                    </td>
                    <td class="tg-0lax" style="border: 4px solid black;border-collapse: collapse;">{!! QrCode::size(200)->generate($id_guia) !!} <br>


                    </td>
                </tr>

                </thead>
            </table>
        @endif
    </div>

</div>
    <br>
    <a></a>
    <div class="row">
        <input class="hidden-print" type="button" onclick="printableDiv('printableArea')" value="Imprimir etiqueta" />
    </div>
@endsection
@section('script')
<script>
    function printableDiv(printableAreaDivId) {


        window.print();


    }
</script>
@endsection
