@extends('layouts.user_type.auth')
@section('content')
    @livewire(App\Http\Livewire\ProcessViaticRequest\ViaticRequestClosed::class, ['viaticRequest' => $viaticRequest])
@endsection
@push('css')
    <link href="../assets/css/progressbar.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="../assets/js/progressbar.js"></script>
@endpush
