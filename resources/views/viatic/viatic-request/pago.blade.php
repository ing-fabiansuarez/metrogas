@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\Pago::class, ['viaticRequest' => $viaticRequest])
@endsection