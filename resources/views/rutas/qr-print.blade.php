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
            font-size: 30px;
            /*padding-left: 25%;*/
        }
        .hidden-print {
            display: none !important;
        }
    }

    /* Estilos para el contenido de la etiqueta */
    #etiqueta {
        width: 100%;
        padding: 0.1cm;
        font-size: 12px;
        line-height: 1.2;
        border: 1px solid #000;
        text-align: center;
    }

    /* Estilos para el QR code */
    /*#qr {*/
    /*    margin-top: 0.5cm;*/
    /*    margin-bottom: 0.5cm;*/
    /*    display: inline-block;*/
    /*    border: 1px solid #000;*/
    /*    padding: 0.5cm;*/
    /*    width: 30%;*/
    /*}*/
    h3 {
        text-align: center;
    }

    hr {
        border-top: 1px solid #bbb;
        width: 80%;
        margin: 20px auto;
    }
    .emisor {
        width: 50%;
        float: left;
    }

    .remitente {
        width: 45%;
        float: right;
    }
    .productos{
        width: 45%;
        float: left;
    }
    .qr{
        width: 45%;
        float: right;
    }
</style>

<div class="card-body" id="printableArea" >
    <div class="row">
        @if( $id_guia)

            <div id="etiqueta">
                <div class="container">
                    <div class="row">
                        <div class="col-md text-center">
                            <img src="{{ URL::asset('assets/images/ssss.png')}}"  width="255" >
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md emisor">
                            <h3>Información del Emisor</h3>
                            <!-- Aquí va la información del emisor -->
                            <p>Nombre: [REEMPLAZAR]</p>
                            <p>Dirección: [REEMPLAZAR]</p>
                            <p>Teléfono: [REEMPLAZAR]</p>
                            <p>SUCURSAL: {{$sucursal}}</p>
                            <p>FECHA DESPACHO: {{$fecha_despacho}}</p>
                        </div>
                        <div class="col-md remitente">
                            <h3>Información del Remitente</h3>
                            <!-- Aquí va la información del remitente -->
                            <p>Nombre: {{$nombre_contact}}</p>
                            <p>Dirección: {{$destino}}</p>
                            <p>Teléfono: {{$telefono}}</p>
                        </div>
                    </div>
                    <h3>Información del Paquete</h3>
                    <h1>ID de guía: {{$id_guia}}</h1>
                    <div class="row">
                        <div class="col-sm productos">
                            <!-- Aquí iría la información de los productos -->
                            <p><strong>Información de los productos:</strong></p>
                            <p>Producto 1: [REEMPLAZAR]</p>
                            <p>Producto 2: [REEMPLAZAR]</p>
                            <p>Producto 3: [REEMPLAZAR]</p>
                            <hr>
                        </div>
                        <div class="col-sm qr">
                                <!-- QR code con el ID de guía -->
                                <div id="qr">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{$id_guia}}">
                                </div>

                        </div>

                </div>



            </div>


        @endif
                <div class="row">
                    <input class="hidden-print" type="button" onclick="printableDiv('printableArea')" value="Imprimir etiqueta" />
                </div>
    </div>

</div>
    <br>
    <a></a>

@endsection
@section('script')
<script>
    function printableDiv(printableAreaDivId) {


        window.print();


    }
</script>
@endsection
