@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\RealizarPago::class, ['viaticRequest' => $viaticRequest])
@endsection