@extends('layouts.user_type.auth')
@section('content')
    @livewire('process-viatic-request.by-create', [
        'viaticRequest' => $viaticRequest,
    ])
@endsection
