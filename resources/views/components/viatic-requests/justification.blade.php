<div class="form-group">
    <label for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
    <textarea class="form-control form-control-sm" rows="3"
        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled>{{ $viaticRequest->justification }}</textarea>
</div>