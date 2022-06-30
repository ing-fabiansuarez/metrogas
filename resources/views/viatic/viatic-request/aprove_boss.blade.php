@extends('layouts.user_type.auth')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                @livewire(App\Http\Livewire\ProcessViaticRequest\AproveBoss::class, ['viaticRequest' => $viaticRequest])
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="../assets/css/progressbar.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="../assets/js/progressbar.js"></script>
@endpush
