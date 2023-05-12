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
            Edición de usuario
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
                        <div class="col-xxl-12 ">
                            <div class="card ">
                                <div class="card-body ">
                                    <div class="text-center">
                                        <div class="profile-user">
                                            <img src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                                 class="  rounded-circle avatar-xl img-thumbnail user-profile-image"
                                                 alt="user-profile-image">
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-16 mb-1">{{$user->name}}</h5>
                                        <p class="text-muted mb-0">{{$user->Empresa}}</p>
                                    </div>
                                </div>
                            </div>
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <p class="text-muted">*Si no registras una contraseña, se usara "welcome1" como contraseña predeterminada</p>
                            <form method="POST" action="{{route('config.guardar')}}">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="firstnameInput" name="firstname" value="{{$user->name}}"
                                                placeholder="Ingresa tu nombre" required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="lastnameInput" name="lastname" value="{{$user->lastname}}"
                                                placeholder="Ingresa tus apellidos" >
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Telefono</label>
                                            <input type="text" class="form-control" id="phonenumberInput" name="phonenumber" value="{{$user->phone_number}}"
                                                placeholder="Ingresa tu telefono">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailInput" name="email" value="{{$user->email}}"
                                                placeholder="Ingresa tu email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="exampleInputpassword" class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="exampleInputpassword" name="password">
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="empresaInput" class="form-label">Empresa</label>
                                            <input type="text" class="form-control" id="empresaInput" name="empresa" value="{{$user->Empresa}}"
                                                placeholder="Ingresa el nombre de tu empresa aqui">
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">Departamento/Ciudad</label>
                                            <input type="text" class="form-control" id="cityInput" name="city" placeholder="Ingresa tu ciudad o departamento"
                                              value="{{$user->Ciudad}}"    />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="direccionInput" class="form-label">Direccion</label>
                                            <input type="text" class="form-control" id="direccionInput" name="direccion"
                                                placeholder="Ingresa tu dirección" value="{{$user->Direccion}}" />
                                        </div>
                                    </div>

                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3 pb-2">
                                            <label for="exampleFormControlTextarea"
                                                class="form-label">Hablanos acerca de ti o tu empresa (opcional)</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your description" name="description"
                                                rows="3">{{$user->descripcion}}</textarea>
                                        </div>
                                    </div>
                                    <!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="roleInput" class="form-label">Rol</label>
                                            <select class="form-select select2" id="roleInput" name="role">
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
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
