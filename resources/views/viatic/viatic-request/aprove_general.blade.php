@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\AproveGeneral::class, ['viaticRequest' => $viaticRequest])
@endsection
