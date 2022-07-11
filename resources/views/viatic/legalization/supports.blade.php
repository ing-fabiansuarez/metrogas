@extends('layouts.user_type.auth')
@section('content')
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-viatic.legalization.progress-bar :stepsCompletes='2' />

            <br>
            <livewire:process-legalization.supports :legalization="$legalization" />

        </div>
    </div>
@endsection
