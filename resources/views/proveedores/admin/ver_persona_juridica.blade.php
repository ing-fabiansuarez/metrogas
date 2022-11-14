@extends('layouts.user_type.auth')

@section('content')
    <a class="btn bg-secundary btn-sm" style="color: white"
        href="{{ route('proveedores.admin.persona-juridica.imprimir', $personaJuridica) }}">Imprimir</a>
    <livewire:form-proveedores.form-persona-juridica :solo_lectura="true" :personaJuridica="$personaJuridica" />
@endsection
