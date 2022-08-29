<div>
    <ul id="progressbar" class="px-0">
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 1) class="active" @endif id="account">
            <strong>Crear Legalización</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 2) class="active" @endif id="personal">
            <strong>Soportes</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 3) class="active" @endif id="personal">
            <strong>{{ __('messages.aprove_boss') }}</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 4) class="active" @endif id="payment">
            <strong>Verificación Dirección Financiera</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 5) class="active" @endif id="payment">
            <strong>Aprobación Dirección Financiera</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 6) class="active" @endif id="payment">
            <strong>Contabilidad</strong>
        </li>
        <li style="width: {{ $width }}%;" @if ($stepsCompletes >= 7) class="active" @endif id="confirm">
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
