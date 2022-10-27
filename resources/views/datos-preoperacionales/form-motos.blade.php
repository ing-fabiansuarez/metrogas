@extends('proveedores.layout.app')

@section('content')
    <livewire:form-datos-preoperacionales.form-datos-preoperacionales-motos :solo_lectura="false" :datosPreoperacional="$datosPreoperacional" />
@endsection
