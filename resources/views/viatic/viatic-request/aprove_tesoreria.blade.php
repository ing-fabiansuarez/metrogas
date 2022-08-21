@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\AproveTesoreria::class, ['viaticRequest' => $viaticRequest])
@endsection
