<div>
    <!-- progressbar -->
    <ul id="progressbar" class="px-0">
        <li id="account" style="width: {{ $width }}%;" @if ($stepsCompletes >= 1) class="active" @endif>
            <strong>{{ __('messages.viatic_request') }}</strong>
        </li>
        <li id="personal" style="width: {{ $width }}%;" @if ($stepsCompletes >= 2) class="active" @endif>
            <strong>{{ __('messages.aprove_boss') }}</strong>
        </li>
        {{-- <li id="payment" style="width: {{ $width }}%;" @if ($stepsCompletes >= 3) class="active" @endif>
            <strong>{{ __('messages.sign_aprove') }}</strong>
        </li> --}}
        <li id="boss" style="width: {{ $width }}%;" @if ($stepsCompletes >= 3) class="active" @endif>
            <strong>Aprobación Financiera</strong>
        </li>
        <li id="confirm" style="width: {{ $width }}%;" @if ($stepsCompletes >= 4) class="active" @endif>
            <strong>Soportes Tesoreria</strong>
        </li>
        <li id="confirm" style="width: {{ $width }}%;" @if ($stepsCompletes >= 5) class="active" @endif>
            <strong>Aprobación Tesoreria</strong>
        </li>
        <li id="confirm" style="width: {{ $width }}%;" @if ($stepsCompletes >= 6) class="active" @endif>
            <strong>Pago</strong>
        </li>
        <li id="confirm" style="width: {{ $width }}%;" @if ($stepsCompletes >= 7) class="active" @endif>
            <strong>{{ __('messages.legalization') }}</strong>
        </li>
        
    </ul>
    <div class="progress">
        <div style="width: {{ $width * $stepsCompletes }}%"
            class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
            aria-valuemax="100"></div>
    </div>
</div>

@push('css')
    <link href="{{ asset('assets/css/progressbar.css') }}" rel="stylesheet" />
@endpush
@push('js')
    <script src="{{ asset('assets/js/progressbar.js') }}"></script>
@endpush
