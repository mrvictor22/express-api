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

                            <div id="permissions-container"></div>

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
            var permissions = {!! json_encode($modules) !!};
            console.log(permissions)
            // Cargar tabla de permisos por AJAX al cargar la página
            loadPermissionsTable();

            // Función para cargar la tabla de permisos por AJAX
            function loadPermissionsTable() {
                $.ajax({
                    url: "{{ route('permissions.index', ['id' => $id]) }}",
                    method: "GET",
                    success: function (data) {
                        $('#permissions-container').html(data);
                    }
                });
            }

            // Función para actualizar los permisos por AJAX
            function updatePermissions(permissions) {
                $.ajax({
                    url: "{{ route('permissions.update', ['id' => $id]) }}",
                    method: "POST",
                    data: {
                        permissions: Object.values(permissions),
                        _token: csrfToken
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Éxito',
                            text: response.message,
                            icon: 'success'
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo actualizar los permisos. Por favor, inténtelo nuevamente.',
                            icon: 'error'
                        });
                    }
                });
            }
            // Manejar cambios en los switches de permisos
            $(document).on('change', '.permission-switch', function () {
                var module = $(this).data('module');
                var permission = $(this).data('permission');
                var isChecked = $(this).prop('checked');

                // Actualizar permiso en el array de permisos
                if (permissions.hasOwnProperty(module)) {
                    permissions[module][permission] = isChecked;
                }

                // Actualizar los permisos por AJAX
                updatePermissions(permissions);
            });
        });




    </script>
@endsection

