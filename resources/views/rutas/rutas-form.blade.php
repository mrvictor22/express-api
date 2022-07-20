@extends('layouts.master')
@section('title')
   Ingreso de rutas
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Rutas
        @endslot
        @slot('title')
            Formulario nueva ruta
        @endslot
    @endcomponent

<div class="row">
    <div class="col-lg-12">

    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Ingreso de datos</h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row g-3">

                            <div class="col-lg-6">
                                <div>
                                    <label for="guiaInput" class="form-label">Número Guía</label>
                                    <input type="text" class="form-control" id="guiaInput" name="guiaInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="vehiculoInput" class="form-label">Vehiculo</label>
                                    <input type="text" class="form-control" id="vehiculoInput" name="vehiculoInput">
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-4">
                                <div>
                                    <label for="n_itemInput" class="form-label">Nombre Item</label>
                                    <input type="text" class="form-control" id="n_itemInput" name="n_itemInput">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div>
                                    <h5 class="fs-13 fw-medium text-muted">Cantidad</h5>
                                    <div class="input-step full-width">
                                        <button type="button" class="minus">–</button>
                                        <input type="number" class="product-quantity" value="0" min="0" max="1000" readonly name="cantidad">
                                        <button type="button" class="plus">+</button>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div>
                                    <label for="c_itemInput" class="form-label">Codigo Item</label>
                                    <input type="text" class="form-control" id="c_itemInput" name="c_itemInput">
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-4">
                                <div>
                                    <label for="nombre_contact_id" class="form-label">Nombre de Contacto</label>
                                    <input type="text" class="form-control" id="nombre_contact_id" name="nombre_contact">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-4">
                                <div>
                                    <label for="numero_contact_id" class="form-label">Numero Contacto</label>
                                    <input type="text" class="form-control" id="numero_contact_id" name="phn_contact">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-4">
                                <div>
                                    <label for="iconInput" class="form-label">Email Contacto</label>
                                    <div class="form-icon">
                                        <input type="email" class="form-control form-control-icon"
                                               id="iconInput" placeholder="example@gmail.com" name="email_contact">
                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->

                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-input-spin.init.js') }}"></script>
@endsection
