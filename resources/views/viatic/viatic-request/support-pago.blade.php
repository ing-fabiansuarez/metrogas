@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\SupportPago::class, ['viaticRequest' => $viaticRequest])
@endsection