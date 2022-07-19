@extends('layouts.user_type.auth')
@section('content')
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-viatic.legalization.progress-bar :stepsCompletes='1' />

            <br>
            <!-- fieldsets -->
            <div>
                @if (session('msg'))
                    <div class="alert {{ session('msg.class') }}" role="alert">
                        {{ session('msg.body') }}
                    </div>
                @endif
                <form id="formLegalization" action="{{ route('legalization.store') }}" method="post">
                    <div class="form-card">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="fs-title">Información Legalización</h2>
                            </div>
                            <div class="col-5">
                                <h2 class="steps">{{ __('messages.step_1') }}</h2>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>{{ __('forms.viatic_request.justificacion') }}</label>
                            <textarea class="form-control form-control-sm" rows="3"
                                placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" name="justification">{{ old('justification') }}</textarea>
                            @error('justification')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="table-responsive p-0">
                            <label>¿És una solicitud de anticipo o un reintegro?</label>
                            <div class="card ">
                                <div class="card-body p-2">
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check" id="btnradio1" name="origen[]"
                                            value="1" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio1">Solicitud de anticipo</label>

                                        <input type="radio" class="btn-check" id="btnradio2" name="origen[]"
                                            value="2" autocomplete="off">
                                        <label class="btn btn-outline-primary" for="btnradio2">Reintegro</label>
                                    </div>

                                    @if (session('origen'))
                                        <span class="text-danger text-message-validation">
                                            {{ session('origen') }}
                                        </span>
                                    @endif
                                    @error('origen')
                                        <span class="text-danger text-message-validation">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    <div style="display: none" class="form-group" id="id_solicitud">
                                        <label for="id_solicitud" class="form-control-label">Selecciona la solicitud de
                                            anticipo</label>
                                        <select name="id_solicitud" class="form-select form-select-sm">
                                            <option value="">{{ __('forms.select.selected') }}</option>
                                            @foreach ($viaticRequests as $request)
                                                <option value="{{ $request->id }}">
                                                    {{ $request->id . ' - ' . $request->justification . ' - ' . $request->getNameState() }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_solicitud')
                                            <span class="text-danger text-message-validation">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <button id="button_create" type="submit" name="next" class="btn next action-button">Crear</button>
                </form>

            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#btnradio1').on('click', function() {
                if ($(this).is(':checked')) {
                    $('#id_solicitud').css("display", "block");
                }
            });
            $('#btnradio2').on('click', function() {
                if ($(this).is(':checked')) {
                    $('#id_solicitud').css("display", "none");
                }
            });
            $('#button_create').click(function(event) {
                event.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Se creara una nueva solicitud',
                    text: '¿Esta Seguro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: '{{ __('forms.close') }}',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        return true;
                    } else {
                        return false;
                    }
                })
            });
        });
    </script>
@endpush
