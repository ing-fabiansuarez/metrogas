@extends('proveedores.layout.app')

@section('content')
    <livewire:form-datos-preoperacionales.form-datos-preoperacionales-carros :solo_lectura="false" :datosPreoperacional="$datosPreoperacional" />
@endsection
