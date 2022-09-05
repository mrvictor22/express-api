@extends('layouts.master')
@section('title')
   Ingreso de rutas
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
            Usuarios
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
                                        <th>User No.</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
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
                order: [],
                ajax: {
                    type: "GET",
                    url: '{{route('config.ajaxindex')}}'

                },
                columns: [
                    { data: 'id' ,
                        "render": function (data, type, row) {
                          return  '<div class="form-check"> <input class="form-check-input fs-15" type="checkbox" name="checkAll" value="'+row.id+'"> </div>'


                        }
                    },
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'created_at' },
                    { data: 'id' ,
                       "render": function (data, type, row) {
                        let url = "{{route('config.edit',['config' => ":id" ])}}";
                        url = url.replace(':id', row.id);
                           return  '<div class="dropdown d-inline-block"><button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end">'
                               // +'<li><a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Ver</a></li>'
                               +'<li><a href="'+url+'" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>'
                               //+'<li>'+'<a class="dropdown-item remove-item-btn">'+'<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete'+'</a>' +'</li>'
                           +'</ul>'
                       +'</div>'


                       }
                    }
                ]
            });
        });
    </script>
@endsection
