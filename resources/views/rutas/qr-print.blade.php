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
    }
    @media print {
        table {
            border: 4px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 4px solid black;
            border-collapse: collapse;
        }
    }
</style>

<div class="card-body" id="printableArea">
    <div class="row">
        @if( $id_guia)

            <table class="tg">
                <thead>
                <tr>
                    <td colspan="2" style="text-align: center"><img src="{{ URL::asset('assets/images/ssss.png')}}"  width="255" ></td></tr>
                <tr>

                    <td class="tg-0lax">
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
                           <li>Dirección: {{$destino}}  </li>
                       
                       </ul>
                    </td>
                    <td class="tg-0lax">{!! QrCode::size(200)->generate($id_guia) !!} <br>


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
        <input type="button" onclick="printableDiv('printableArea')" value="Imprimir etiqueta" />
    </div>
@endsection
@section('script')
<script>
    function printableDiv(printableAreaDivId) {
        var printContents = document.getElementById(printableAreaDivId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection
