@extends('layouts.master')
@section('title')
   Ingreso de Usuarios
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
            Usuarios
        @endslot
        @slot('title')
            Lista de usuarios
        @endslot
    @endcomponent

    @inject('role', 'Spatie\Permission\Models\Role')
    @inject('permission', 'Spatie\Permission\Models\Permission')

    <meta name="csrf-token" content="{{ csrf_token() }}">


<div class="row">
    <div class="col-lg-12">

    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    @role('admin')
                    @if(auth()->user()->can('admin.create'))
                        <!-- Mostrar contenido que solo los usuarios con el rol "admin" y el permiso "admin.create" pueden ver -->
                        <div class="flex-grow-1">
                            <button type="button" class="btn rounded-pill btn-primary waves-effect waves-light" onclick="window.location.href='{{ route('config.create') }}'">Crear nuevo usuario</button>
                        </div>
                    @endif
                    @endrole

                </div><!-- end card header -->
                <div class="card-body">

                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log(csrfToken);

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
                    {
                        data: 'id',
                        "render": function (data, type, row) {
                            let url = "{{route('config.edit',['config' => ':id' ])}}";
                            url = url.replace(':id', row.id);
                            let deleteUrl = "{{route('config.eliminar', ['id' => ':id'])}}";
                            deleteUrl = deleteUrl.replace(':id', row.id);
                            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                            return '<div class="dropdown d-inline-block">'
                                + '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">'
                                + '<i class="ri-more-fill align-middle"></i></button><ul class="dropdown-menu dropdown-menu-end">'
                                + '<li><a href="' + url + '" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>'
                                + '<li>'
                                + '<button class="dropdown-item remove-item-btn" onclick="event.preventDefault(); deleteItem(' + row.id + ', \'' + csrfToken + '\', \'' + deleteUrl + '\')">'
                                + '<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete'
                                + '</button>'
                                + '</li>'
                                + '<li>'
                                + '<button class="dropdown-item view-item-btn" data-ver="' + row.id + '" data-info=\'' + JSON.stringify(row) + '\'>'
                                + '<i class="ri-eye-fill align-bottom me-2 text-muted"></i> View'
                                + '</button>'
                                + '</li>'
                                + '</ul>'
                                + '</div>';
                        }
                    }
                ]
            });
        });
        function deleteItem(id, token, url) {
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡Una vez eliminado, no podrá recuperar este usuario!",
                icon: "warning",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Eliminar!',
                denyButtonText: `!No, cancelar!`,
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {

                            let deleteUrl = url.replace(':id', id);
                            let data = {_method: 'DELETE', _token: token};
                            console.log(deleteUrl);
                            console.log(data);
                            axios.post(deleteUrl, data)
                                .then(function(response){
                                    //log the response
                                    console.log(response);
                                    Swal.fire("¡Usuario eliminado exitosamente!", {
                                        icon: "success",
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                })
                                .catch(function(error){
                                    Swal.fire("¡No se pudo eliminar el usuario!", {
                                        icon: "error",
                                    });
                                });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
        });

        }
        $(document).on('click', '.view-item-btn', function() {
            let userId = $(this).data('ver');
            let userInfo = $(this).data('info');
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let url = "{{route('config.ver', ['id' => ':id'])}}";
            url = url.replace(':id', userId);

            $.ajax({
                url: url,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Información del usuario',
                        html: '<b>Nombre:</b> ' + response.name + '<br>' +
                            '<b>Apellidos:</b> ' + response.lastname + '<br>' +
                            '<b>Telefono:</b> ' + response.phone_number + '<br>' +
                            '<b>Email:</b> ' + response.email + '<br>' +
                            '<b>Empresa:</b> ' + response.Empresa + '<br>' +
                            '<b>Ciudad:</b> ' + response.Ciudad + '<br>' +
                            '<b>Ciudad:</b> ' + response.Direccion + '<br>' +
                            '<b>Fecha de registro:</b> ' + response.created_at + '<br>' +
                            '<b>Información Extra:</b> ' + response.descripcion + '<br>',
                        confirmButtonText: 'OK'
                    });
                },
                error: function(response) {
                    Swal.fire({
                        title: 'Error',
                        text: response.responseJSON.error,
                        icon: 'error'
                    });
                }
            });
        });
    </script>
@endsection
