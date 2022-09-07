@extends('layouts.user_type.auth')
@section('content')
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-legalizations.progress-bar :stepsCompletes='4' />

            <br>
            <livewire:process-legalization.check-general :legalization="$legalization" />

        </div>
    </div>
@endsection
