@extends('layouts.master')
@section('title')
    Listado de permisos
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
            Permisos
        @endslot
        @slot('title')
            Permisos por modulo
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
                                <table id="permissions-table" class="table">
                                    <thead>
                                    <tr>
                                        <th>Módulo</th>
                                        <th>Crear</th>
                                        <th>Leer</th>
                                        <th>Actualizar</th>
                                        <th>Borrar</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modules as $module => $permissions)
                                        <tr>
                                            <td>{{ $module }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-create" {{ $permissions['create'] ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $module }}-create"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-read" {{ $permissions['read'] ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $module }}-read"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-update" {{ $permissions['update'] ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $module }}-update"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-delete" {{ $permissions['delete'] ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $module }}-delete"></label>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
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

        $(document).ready(function() {
            var table = $('#permissions-table').DataTable({
                "paging": false,
                "info": false,
                "searching": false,
                "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<button class='btn btn-sm btn-primary save-button'>Guardar</button>"
                }]
            });

            $('#permissions-table tbody').on('click', '.save-button', function() {
                var row = $(this).parents('tr');
                var rowData = table.row(row).data();
                var module = rowData[0];
                var create = row.find('#' + module + '-create').prop('checked');
                var read = row.find('#' + module + '-read').prop('checked');
                var update = row.find('#' + module + '-update').prop('checked');
                var del = row.find('#' + module + '-delete').prop('checked');
                $.ajax({
                    url: '/permissions/update',
                    method: 'POST',
                    data: {
                        'role_id': '{{ $role->id }}',
                        'module': module,
                        'create': create,
                        'read': read,
                        'update': update,
                        'delete': del
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Permisos actualizados correctamente.');
                        } else {
                            toastr.error('Error al actualizar los permisos.');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('Error al actualizar los permisos.');
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.permission-switch').change(function() {
                var permission = $(this).attr('id').split('-');
                var module = permission[0];
                var action = permission[1];
                var value = $(this).prop('checked');

                $.ajax({
                    url: '/permissions/update',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        module: module,
                        action: action,
                        value: value
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });




    </script>
@endsection

