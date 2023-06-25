@extends('layouts.master')
@section('title')
   Listado de roles
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
            Roles
        @endslot
        @slot('title')
            Lista de Roles
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
                    @if(auth()->user()->can('Configuracion.create'))
                        <!-- Mostrar contenido que solo los usuarios con el rol "admin" y el permiso "admin.create" pueden ver -->
                        <div class="flex-grow-1">
                            <button type="button" id="create-role-btn" class="btn rounded-pill btn-primary waves-effect waves-light">Crear nuevo rol</button>
                        </div>
                    @endif
                    @endrole

                </div><!-- end card header -->
                <div class="card-body">

                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <table id="roles-table" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width: 10px;">
                                            <div class="form-check">
                                                <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th>Nombre de rol</th>
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
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false},
                ]
            });
        });

        $(document).ready(function () {
            $('#create-role-btn').click(function () {
                Swal.fire({
                    title: 'Crear Rol',
                    html: `<form id="create-role-form" action="{{ route('roles.store') }}" method="POST">
                            @csrf

                    <div class="form-group">
                        <label for="name">Nombre del Rol:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group" hidden>
                        <label for="guard_name">Guard Name:</label>
                        <input type="text" class="form-control" id="guard_name" value="web" name="guard_name">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>`,
                    showCancelButton: true,
                    showConfirmButton: false,
                    cancelButtonText: 'Cancelar',
                    cancelButtonColor: '#d33',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    onOpen: function () {
                        $('#create-role-form').submit(function (event) {
                            event.preventDefault();

                            $.ajax({
                                url: $(this).attr('action'),
                                method: 'POST',
                                data: $(this).serialize(),
                                success: function () {
                                    Swal.fire({
                                        title: '¡Rol creado!',
                                        text: 'El rol se ha creado exitosamente.',
                                        icon: 'success'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.reload(); // Recargar la página actual
                                        }
                                    });
                                },
                                error: function () {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'No se pudo crear el rol. Por favor, inténtelo nuevamente.',
                                        icon: 'error'
                                    });
                                }
                            });
                        });
                    }
                });
            });
        });


    </script>
@endsection
