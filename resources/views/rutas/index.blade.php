@extends('layouts.master')
@section('title')
   Rutas
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
            Rutas
        @endslot
        @slot('title')
            Lista
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
                    <h4 class="card-title mb-0 flex-grow-1">Listado de rutas</h4>

                </div><!-- end card header -->
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="user-table" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>No. Guia</th>
                                        <th>Vehiculo</th>
                                        <th>Dirección de contacto</th>
                                        <th>Nombre de contacto</th>
                                        <th>Sucursal</th>
                                        <th>Fecha de despacho</th>
                                        <th>Fecha de registro</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
   <div class="row">
       <div class="col-lg-12">
           <div class="card-border-info">

               <iframe
                   name='beetrack-widget'
                   id='beetrack-widget'
                   frameBorder='0'
                   width='100%'
                   height='310px'
                   src='https://app.beetrack.com/widget/KiVahrbTgPcgCJFgspPhWA'></iframe>
           </div>
       </div>
   </div>


    <div id="data-modal" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/hrqwmuhr.json"
                               trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:120px;height:120px">
                    </lord-icon>
                    <div class="mt-4">
                        <h4 class="mb-3">Oops something went wrong!</h4>
                        <p class="text-muted mb-4"> The transfer was not successfully received by us. the email of the recipient wasn't correct.</p>
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <a href="javascript:void(0);" class="btn btn-danger">Try Again</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#user-table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        text: 'Exportar CSV',
                        titleAttr: 'export_csv',
                        action: function ( e, dt, button, config ) {
                            window.location = '{{route('rutas.export-csv')}}';
                        }
                    },
                        @if(auth()->user()->hasRole('admin'))
                    {
                        text: 'Exportar CSV Personalizado',
                        titleAttr: 'export_custom_csv',
                        action: function ( e, dt, button, config ) {
                            window.location = '{{route('rutas.export-custom-csv')}}';
                        }
                    }
                    @endif
                ],
                order: [],
                ajax: {
                    type: "GET",
                    url: '{{route('rutas.ajaxindex')}}'

                },
                columns: [
                    { data: 'id' ,
                        "render": function (data, type, row) {
                          return  '<div class="form-check"> <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="'+row.id+'"> </div>'


                        }
                    },
                    { data: 'numero_guia' },
                    { data: 'vehiculo' },
                    { data: 'direccion_contact' },
                    { data: 'nombre_contact' },
                    { data: 'sucursal' },
                    { data: 'fecha_despacho' },
                    { data: 'fecha_registro' },
                    { data: 'id' ,
                       "render": function (data, type, row) {

                           return  '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end">'
                               // +'<li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li>'
                               +'<li><a onclick=openInNewTab('+ row.id +') class="dropdown-item" ><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver QR</a></li>'
                               //+'<li><a class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>'
                               //+'<li>'+'<a class="dropdown-item remove-item-btn">'+'<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete'+'</a>' +'</li>'
                           +'</ul>'
                       +'</div>'


                       }
                    }
                ]
            });

            $('.img').click(function() {

            });
        });


        function openInNewTab(id) {
           var url = '{{route('ruta.print-qr',['ruta' => ":id"])}}';
            url = url.replace(':id', id);
           console.log(id);
            window.open(url).focus();
        }
    </script>
@endsection
