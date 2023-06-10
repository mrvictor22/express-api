<table id="permissions-table" class="table">
    <thead>
    <tr>
        <th>Módulo</th>
        <th>Crear</th>
        <th>Leer</th>
        <th>Actualizar</th>
        <th>Borrar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($modules as $module => $permissions)
        <tr>
            <td>{{ $module }}</td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-create" data-module="{{ $module }}" data-permission="{{ $module }}.create" {{ $permissions['create'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $module }}-create"></label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-read" data-module="{{ $module }}" data-permission="{{ $module }}.read" {{ $permissions['read'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $module }}-read"></label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-update" data-module="{{ $module }}" data-permission="{{ $module }}.update" {{ $permissions['update'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $module }}-update"></label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input permission-switch" type="checkbox" role="switch" id="{{ $module }}-delete" data-module="{{ $module }}" data-permission="{{ $module }}.delete" {{ $permissions['delete'] ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $module }}-delete"></label>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<?php
