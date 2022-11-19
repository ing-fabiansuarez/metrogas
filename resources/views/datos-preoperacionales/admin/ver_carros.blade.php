@extends('layouts.user_type.auth')

@section('content')
    <a class="btn bg-secundary btn-sm" style="color: white"
        href="{{ route('admin.preoperacional.carro.imprimir', $formulario) }}">Imprimir</a>
    <livewire:form-datos-preoperacionales.form-datos-preoperacionales-carros :solo_lectura="true" :formulario="$formulario" />
@endsection
