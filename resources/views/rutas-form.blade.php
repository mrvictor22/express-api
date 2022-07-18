@extends('layouts.master')
@section('title')
    @lang('translation.basic-elements')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Rutas
        @endslot
        @slot('title')
            Formulario nueva ruta
        @endslot
    @endcomponent

<div class="row">
    <div class="col-lg-12">

    </div>
</div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
