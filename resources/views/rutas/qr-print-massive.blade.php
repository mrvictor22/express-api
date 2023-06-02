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
            GENERACION MASIVA
        @endslot
        @slot('title')
            QR
        @endslot
    @endcomponent

    <div class="row">
        <div class="hidden-print">
            <div class="text-center">
                <button class="btn btn-primary hidden-print" onclick="printableDiv('printableArea')">Imprimir</button>
                <button class="btn btn-danger hidden-print" onclick="cerrarPestana()">Volver</button>
                <br>
                <a href="#" onclick="mostrarVideo()">Tutorial de configuración de impresora</a>
                <br>
                <div id="video-container"></div>
            </div>
        </div>
    </div>
    <div class="card-body" id="printableArea2">
        @foreach($rutas as $ruta)
        <div id="etiqueta2">
            <div class="container seccion-1">
                <div class="row">
                    <div class="col text-center logo">
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
                        Sucursal: {{$ruta->sucursal}}<br>

                        <br> <h6>Recibe</h6>
                        <!-- Aquí va la información del remitente -->
                        <p>Nombre de contacto: {{$ruta->nombre_contact}}</p>
                        <span >Dirección: </span> <span class="direccion">{{$ruta->direccion_contact}}</span>
                        <p>Teléfono: {{$ruta->phn_contact}}</p>
                        <!-- Aquí iría la información de los productos -->
                        <h6 id="z22">Articulos:</h6>
                        <span id="z22">{{ count($ruta->productos) }}</span> <br>
                        <h6 id="z22">Total a Cobrar</h6>
                        <span id="z22">{{ $ruta->monto_a_cobrar_general }}</span><br>

                    </div>



                </div>

        </div>
        @endforeach
    </div>

@endsection
@section('script')
<script>
    function printableDiv(printableAreaDivId) {
        window.print();
    }
    function cerrarPestana() {
        window.history.back();
    }
    function eliminarElemento() {
        var elementos = document.querySelectorAll("#z22");
        for (var i = 0; i < elementos.length; i++) {
            elementos[i].parentNode.removeChild(elementos[i]);
        }
    }

    var elementoGuia = document.querySelector('.guia b');
    var numeroGuia = '{{ $ruta->numero_guia }}';

    if (numeroGuia.length > 6) {
        elementoGuia.classList.add('grande');
    } else {
        elementoGuia.classList.remove('grande');
    }

    var usuariosNoPermitidos = ['2', '3', '4', '5', '6', '7', '8', '9', '11'];
    var usr = '{{ $ruta->creado_por }}';

    if (usuariosNoPermitidos.includes(usr)) {
        eliminarElemento();
    }
    function mostrarVideo() {
        document.getElementById("video-container").innerHTML = '<iframe width="840" height="415" src="https://www.youtube.com/embed/H0rOaEwAQyY?start=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
    }

</script>
@endsection
