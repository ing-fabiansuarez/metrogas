@extends('layouts.user_type.auth')

@section('content')
    <a class="btn bg-secundary btn-sm" style="color: white"
        href="{{ route('admin.preoperacional.moto.imprimir', $formulario) }}">Imprimir</a>
    <livewire:form-datos-preoperacionales.form-datos-preoperacionales-motos :solo_lectura="true" :formulario="$formulario" />
@endsection
