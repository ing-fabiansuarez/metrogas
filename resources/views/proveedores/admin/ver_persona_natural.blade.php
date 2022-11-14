@extends('layouts.user_type.auth')

@section('content')
    <a class="btn bg-secundary btn-sm" style="color: white"
        href="{{ route('proveedores.admin.persona-natural.imprimir', $personaNatural) }}">Imprimir</a>
    <livewire:form-proveedores.form-persona-natural :solo_lectura="true" :personaNatural="$personaNatural" />
@endsection
