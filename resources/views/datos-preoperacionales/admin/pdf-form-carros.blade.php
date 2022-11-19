@extends('proveedores.layout.app')

@section('content')
    <livewire:form-datos-preoperacionales.form-datos-preoperacionales-carros :solo_lectura="true" :formulario="$formulario" />
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        }, false);
    </script>
@endpush