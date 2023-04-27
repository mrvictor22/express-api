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
    <link href="{{ URL::asset('assets/css/qr.css') }}" rel="stylesheet" type="text/css" />
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

    <div class="row">
        <div class="hidden-print">
            <div class="text-center">
                <button class="btn btn-primary hidden-print" onclick="printableDiv('printableArea')">Imprimir</button>
                <button class="btn btn-danger hidden-print" onclick="cerrarPestana()">Cerrar</button>

            </div>
        </div>
    </div>
    <div class="card-body" id="printableArea">
        <div id="etiqueta">
            <div class="container seccion-1">
                <div class="row">
                    <div class="col text-center">
                        <img id="logo" src="{{ URL::asset('assets/images/ssss.png')}}" width="125" />
                    </div>
                    <div class="col contact-info text-nowrap text-center text-uppercase font-weight-bold">
                            ENVIOS A TODO EL SALVADOR
                            <br> <i class='bx bxl-whatsapp'></i>74595990 / 22894200<i class='bx bx-phone' ></i>
                        <div class="row">
                            <div class="col contact-info text-nowrap text-center text-uppercase font-weight-bold guia">
                                <b>ID de guía: {{$ruta->numero_guia}}</b>
                            </div>

                        </div>
                    </div>

                    <div class="col qr narrow">
                        <!-- QR code con el ID de guía -->
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=110x110&data={{$ruta->numero_guia}}" />
                    </div>


                </div>

            </div>

                <div class="row seccion-2">
                    <div class="col remitente narrow text-justify">
                        <h6>Envia</h6>
                        Sucursal: {{$ruta->creado_por}}<br>

                        <br> <h6>Recibe</h6>
                        <!-- Aquí va la información del remitente -->
                        <p>Nombre de contacto: {{$ruta->nombre_contact}}</p>
                        <p>Dirección: {{$ruta->direccion_contact}}</p>
                        <p>Teléfono: {{$ruta->phn_contact}}</p>

                    </div>
                    <div class="col productos narrow text-left">
                        <!-- Aquí iría la información de los productos -->
                        <h6>Articulos:</h6>
                        {{ count($ruta->productos) }} <br>
                        <h6>Total a Cobrar</h6>
                        {{ $ruta->productos->sum('monto_cobrar') }}<br>

                        <hr>
                    </div>


                </div>

        </div>

@endsection
@section('script')
<script>
    function printableDiv(printableAreaDivId) {
        window.print();
    }
    function cerrarPestana() {
        window.close();
    }
</script>
@endsection
