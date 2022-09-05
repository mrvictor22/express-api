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
                    <p class="text-muted">Todos los elementos marcados con * son obligatorios</p>
                </div><!-- end card header -->
                <div class="card-body">
                    <form method="POST" action="{{route('routes-form.store')}}" >
                        @csrf
                    <div class="live-preview">
                        <div class="row gy-4">

                            <div class="col-lg-6">
                                <div>
                                    <label for="guiaInput" class="form-label">Número Guía</label> <label class="text-muted">*</label>
                                    <input type="text" class="form-control" id="guiaInput" name="guiaInput" required>

                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <div>
                                    <label for="nombre_contact_id" class="form-label">Nombre de Contacto</label>
                                    <input type="text" class="form-control" id="nombre_contact_id" name="nombre_contact">
                                </div>
                            </div>
                            <!--end col-->




                            <!--end col-->
                            <br>
                        <div class="row align-items-center g-3">
                            <div class="col-lg-4">
                                <div>
                                    <label for="direccion_contact_id" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="direccion_contact_id" name="direccion_contact">
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
                                               id="iconInput" placeholder="example@gmail.com" name="email_contact" >
                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                        <br>
                        <div class="row align-items-center g-3">
                            <div class="col-lg-3">
                                <div>
                                    <label for="vehiculoInput" class="form-label">Vehiculo</label><label class="text-muted">*</label>
{{--                                    <input type="text" class="form-control" id="vehiculoInput" name="vehiculoInput">--}}
                                    <select class="js-data-example-ajax " name="vehiculoInput" required></select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-3">
                                <div>
                                    <label for="sucursal_contact_id" class="form-label">Sucursal</label>
                                    <input type="text" class="form-control" id="sucursal_contact_id" name="sucursal_contact">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div>
                                    <label class="form-label mb-0">Fecha de despacho</label><label class="text-muted">*</label>

                                    <input id="date" type="text" class="form-control date-input"  name='fecha_despacho'
                                        data-date-format="Y-m-d" required>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div>
                                    <label class="form-label mb-0">Modo</label><label class="text-muted">*</label>
                                    <select class="form-select" name="mode" required>
                                        <option value="" selected disabled hidden>Elige el modo</option>
                                        <option value="0">Por defecto</option>
                                        <option value="1">Solo recogida</option>
                                        <option value="2">Recogida y entrega</option>
                                        <option value="3">Recogida y entrega inmediata</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->

                        </div>
                        <!--end row-->
                            <div class="col-lg-11">
                                <div class="row gy-4" id="one">

                                    <table>
                                        <tr>
                                            <td>
                                                Nombre producto
                                                <input type="text" class="form-control" id="n_itemInput" name="DetailsName[0]" >

                                            </td>
                                            <td>
                                                <div>
                                                    Cantidad
                                                    <input type="text" class="form-control" id="n_itemamount"name="DetailsAmount[0]" >


                                                </div>
                                            </td>
                                            <td>
                                                Codigo
                                                <input type="text" class="form-control" id="c_itemInput" name="DetailsCode[0]" >

                                            </td>

                                        </tr>
                                    </table>



                                </div>

                            </div>
                            <div class="col-sm-1">
                                <div class="d-grid gap-2">
                                    <button id="button" type="button" class="btn rounded-pill btn-dark waves-effect waves-light">Nuevo producto</button>
                                </div>

                            </div>
                        </div>

                        {{-- End col --}}
                        <br>
                        <div class="row align-items-center g-3">
                            <div class="col">

                            </div>
                            <div class="col d-grid gap-2">
                                <button type="submit" class="btn rounded-pill btn-primary waves-effect waves-light">Guardar</button>
                            </div>
                            <div class="col">

                            </div>
                        </div>
                    </div>
                </form>

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
    <script>
       $(document).ready(function(){

$('#button').click(function(){
       // $('#one').clone().insertAfter("#one");
       var clone = $('table tr:first').clone();
       var index = $('table tr').length;
       var input = clone.find('input');
       input.each(function( noIndex ) {
             //alert( index + ": " + $( this ).prop('name') );
            var oldName = $( this ).prop('name');
           //replace the first number occurance with index
           var newName = oldName.replace(/\d/,index);
        //    $( this ).prop('name',newName).val(newName);
           $( this ).prop('name',newName);
           $( this ).val('');
       });
    //    $('#button').text('length: '+ input.length);

       $('table').append(clone);
       });
});
       var token = '{{ env('BEETRACK_API_TOKEN') }}';

       function matchCustom(params, data) {
           // If there are no search terms, return all of the data
           if ($.trim(params.term) === '') {
               return data;
           }

           // Do not display the item if there is no 'text' property
           if (typeof data.text === 'undefined') {
               return null;
           }

           // `params.term` should be the term that is used for searching
           // `data.text` is the text that is displayed for the data object
           if (data.text.indexOf(params.term) > -1) {
               var modifiedData = $.extend({}, data, true);
               modifiedData.text += ' (matched)';

               // You can return modified objects from here
               // This includes matching the `children` how you want in nested data sets
               return modifiedData;
           }

           // Return `null` if the term should not be displayed
           return null;
       }

       $('.js-data-example-ajax').select2({
           matcher: matchCustom,
           ajax: {
               url: '{{route('rutas.call-trucks')}}',
               dataType: 'json'

           },
           minimumResultsForSearch: -1
       });
       const fp = flatpickr(".date-input", {allowInput:true});
</script>
@endsection
