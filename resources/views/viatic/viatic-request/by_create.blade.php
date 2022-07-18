@extends('layouts.user_type.auth')
@section('content')
    @livewire('process-viatic-request.by-create', [
        'viaticRequest' => $viaticRequest,
    ])
@endsection
@push('css')
    <link href="{{ asset('assets/css/progressbar.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('assets/js/progressbar.js') }}"></script>
@endpush
