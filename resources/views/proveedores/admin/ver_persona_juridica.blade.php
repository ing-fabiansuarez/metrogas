@extends('layouts.user_type.auth')

@section('content')
    <livewire:form-proveedores.form-persona-juridica :solo_lectura="true" :personaJuridica="$personaJuridica" />
@endsection
