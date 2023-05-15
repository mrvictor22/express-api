{{-- Botón de editar --}}
<a  class="btn btn-primary" onclick="editRole({{ $role->id }})">Editar<i class="fas fa-edit"></i></a>


{{-- Botón de permisos de rol --}}
<a href="{{ route('roles.show', $role->id) }}" class="btn btn-success">Permisos de rol<i class="fas fa-lock"></i></a>

{{-- Botón de eliminar --}}
<form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este rol?')">Eliminar<i class="fas fa-trash"></i></button>
</form>

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

    </script>


