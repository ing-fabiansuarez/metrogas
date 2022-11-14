@extends('proveedores.layout.app')
@section('content')
    <livewire:form-proveedores.form-persona-natural :solo_lectura="true" :personaNatural="$personaNatural" />
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        }, false);
    </script>
@endpush
