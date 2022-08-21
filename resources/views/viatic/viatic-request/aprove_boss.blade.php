@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\AproveBoss::class, ['viaticRequest' => $viaticRequest])
@endsection