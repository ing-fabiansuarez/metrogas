@extends('layouts.user_type.auth')

@section('content')
    <livewire:form-datos-preoperacionales.form-datos-preoperacionales-motos :solo_lectura="true" 
        :formulario="$formulario" />
@endsection
