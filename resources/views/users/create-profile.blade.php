@extends('layouts.master')
@section('title')
    @lang('translation.settings')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Usuarios
        @endslot
        @slot('title')
            Crear nuevo usuario
        @endslot
    @endcomponent
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ URL::asset('assets/images/create-bg.jpg') }}" class="profile-wid-img" alt="" style="position: absolute">
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Información general
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <p class="text-muted">*Si no registras una contraseña, se usara "welcome1" como contraseña predeterminada</p>
                            <form method="POST" action="{{route('config.guardar')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="firstnameInput" name="firstname"
                                                placeholder="Ingresa tu nombre" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="lastnameInput" name="lastname"
                                                placeholder="Ingresa tus apellidos" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Telefono</label>
                                            <input type="text" class="form-control" id="phonenumberInput" name="phonenumber"
                                                placeholder="Ingresa tu telefono">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailInput" name="email"
                                                placeholder="Ingresa tu email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="exampleInputpassword" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="exampleInputpassword" name="password" >
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="empresaInput" class="form-label">Empresa</label>
                                            <input type="text" class="form-control" id="empresaInput" name="empresa"
                                                placeholder="Ingresa el nombre de tu empresa aqui">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">Departamento/Ciudad</label>
                                            <input type="text" class="form-control" id="cityInput" name="city" placeholder="Ingresa tu ciudad o departamento"
                                                 />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="direccionInput" class="form-label">Direccion</label>
                                            <input type="text" class="form-control" id="direccionInput" name="direccion"
                                                placeholder="Ingresa tu dirección" />
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3 pb-2">
                                            <label for="exampleFormControlTextarea"
                                                class="form-label">Hablanos acerca de ti o tu empresa (opcional)</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your description" name="description"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="roleInput" class="form-label">Rol</label>
                                            <select class="form-select select2" id="roleInput" name="role">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn rounded-pill btn-primary waves-effect waves-light">Guardar</button>
                                        </div>
                                    </div>

                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->

                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
