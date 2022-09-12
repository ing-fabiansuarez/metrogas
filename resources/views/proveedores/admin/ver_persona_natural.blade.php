@extends('layouts.user_type.auth')

@section('content')
    <livewire:form-proveedores.form-persona-natural :solo_lectura="true" :personaNatural="$personaNatural"/>    
@endsection
