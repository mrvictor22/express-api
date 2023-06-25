<form id="edit-role-form" action="{{ route('roles.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nombre del Rol:</label>
        <input type="text" class="form-control editable-input" id="name" name="name" value="{{ $role->name }}" @if($role->name == 'admin') disabled @endif required>
    </div>

    <div class="form-group">
        <label for="guard_name">Guard Name:</label>
        <input type="text" class="form-control editable-input" id="guard_name" name="guard_name" value="{{ $role->guard_name }}" @if($isAdmin) disabled @endif required>
    </div>
</form>



