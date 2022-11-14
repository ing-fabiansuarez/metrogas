@extends('proveedores.layout.app')

@section('content')
    <livewire:form-proveedores.form-persona-juridica :solo_lectura="true" :personaJuridica="$personaJuridica" />
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        }, false);
    </script>
@endpush
