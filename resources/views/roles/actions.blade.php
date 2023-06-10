{{-- Botón de editar --}}
@if ($role->id != 4)
    <a class="btn btn-primary" onclick="editRole({{ $role->id }})">Editar<i class="fas fa-edit"></i></a>
@endif
{{-- Botón de permisos de rol --}}
<a href="{{ route('permissions.index', ['id' => $role->id]) }}" class="btn btn-success">Permisos de rol<i class="fas fa-lock"></i></a>


{{-- Botón de eliminar --}}
@if ($role->id != 4)
    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger" onclick="deleteItem({{ $role->id }}, '{{ csrf_token() }}', '{{ route('roles.destroy', $role->id) }}')">
            Eliminar <i class="fas fa-trash"></i>
        </button>
    </form>
@endif


    <script>
        function editRole(id) {
            $.ajax({
                url: '/roles/' + id + '/edit',
                method: 'GET',
                success: function (data) {
                    Swal.fire({
                        title: 'Editar Rol',
                        html: data,
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Guardar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#edit-role-form').submit();
                        }
                    });
                }
            });
        }
        function deleteItem(id, token, url) {
            Swal.fire({
                title: "¿Está seguro?",
                text: "¡Una vez eliminado, no podrá recuperar este rol!",
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
                            Swal.fire("¡Rol eliminado exitosamente!", {
                                icon: "success",
                            }).then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(function(error){
                            Swal.fire("¡No se pudo eliminar el rol!", {
                                icon: "error",
                            });
                        });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            });



        }



    </script>


