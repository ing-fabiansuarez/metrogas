@extends('layouts.user_type.auth')
@section('content')
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-viatic.legalization.progress-bar :stepsCompletes='5' />

            <br>
            <livewire:process-legalization.aprove-contabilidad :legalization="$legalization" />

        </div>
    </div>
@endsection
