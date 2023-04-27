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
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <img id="logo" src="{{ URL::asset('assets/images/ssss.png')}}" width="125" />
                    </div>
                    <div class="col contact-info text-center">
                        <div class="row">
                            ENVIOS A TODO EL SALVADOR
                            <br>
                            <br>Telefonos: <br> 74595990 / 22894200
                            <br>
                        </div>
                        <div class="row">
                            col
                        </div>

                    </div>
                    <div class="col qr narrow">
                        <!-- QR code con el ID de guía -->
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=110x110&data={{$ruta->numero_guia}}" />
                    </div>
                    <div class="w-100"></div>
                    <div class="col"></div>
                    <div class="col"><h6>ID de guía: {{$ruta->numero_guia}}</h6></div>
                    <div class="col"></div>

                </div>

            </div>

                <div class="row">
                    <h6>ID de guía: {{$ruta->numero_guia}}</h6>
                </div>
                <div class="row">
                    <div class="col-sm remitente narrow">
                        <h6>Recibe:</h6>
                        <!-- Aquí va la información del remitente -->
                        <p>Nombre: {{$ruta->nombre_contact}}</p>
                        <p>Dirección: {{$ruta->direccion_contact}}</p>
                        <p>Teléfono: {{$ruta->phn_contact}}</p>
                        <h6>Envia:{{$ruta->creado_por}}</h6>
                    </div>
                    <div class="col-sm productos narrow">
                        <!-- Aquí iría la información de los productos -->
                        <p><strong>Información de los productos:</strong></p>
                        <table>
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Código</th>
                                <th>Monto a cobrar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ruta->productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre_prod }}</td>
                                    <td>{{ $producto->cant_prod }}</td>
                                    <td>{{ $producto->cod_prod }}</td>
                                    <td>{{ $producto->monto_cobrar }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
