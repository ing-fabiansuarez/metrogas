<div class="card px-3 pt-4 pb-0 mt-0 mb-3">
    <div id="msform">
        <!-- progressbar -->
        <ul id="progressbar" class="px-0">
            <li class="active" id="account"><strong>{{ __('messages.viatic_request') }}</strong> </li>
            <li id="personal"><strong>{{ __('messages.aprove_boss') }}</strong></li>
            <li id="payment"><strong>{{ __('messages.sign_aprove') }}</strong></li>
            <li id="boss"><strong>{{ __('messages.general_aprove') }}</strong></li>
            <li id="confirm"><strong>Tesoreria y Dirección Financiera</strong></li>
            <li id="confirm"><strong>{{ __('messages.legalization') }}</strong></li>
        </ul>
        <div class="progress">
            <div style="width: 16.6%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
        <!-- fieldsets -->
        <div>

            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">{{ __('messages.information_request') }}</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">{{ __('messages.step_1') }}</h2>
                    </div>
                </div>
                {{-- Justificacion --}}
                <div class="form-group">
                    <label>{{ __('forms.viatic_request.justificacion') }}</label>
                    <textarea class="form-control form-control-sm" rows="3"
                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" wire:model.defer="justification"></textarea>
                    @error('justification')
                        <span class="text-danger text-message-validation">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- comision --}}
                <div class="table-responsive p-0">
                    <label>{{ __('messages.information_about_comision') }}</label>
                    <div class="card bg-gray-100 ">
                        <div class="card-body p-2">
                            <form wire:submit.prevent="addSite">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ __('forms.viatic_request.origin_site') }}
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ __('forms.viatic_request.destination_site') }}
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ __('forms.viatic_request.start_date') }}
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ __('forms.viatic_request.end_date') }}
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Acción
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($listSite as $index => $site)
                                            <tr>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $site['name_origin'] }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $site['name_destination'] }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $site['start_date'] }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $site['end_date'] }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a wire:click="$emit('deleteSiteDetalle',{{ $index }})">
                                                        <i
                                                            class="cursor-pointer fas fa-trash text-secondary text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-center">
                                                <x-selects-group.sites-origin />
                                                @error('origin')
                                                    <span class="text-danger text-message-validation">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </td>
                                            <td class="text-center">
                                                <x-selects-group.sites-destination />
                                                @error('destination')
                                                    <span class="text-danger text-message-validation">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </td>
                                            <td class="text-center">
                                                <div class="form-group">
                                                    <input class="form-control form-control-sm" type="date"
                                                        wire:model.defer="start_date">
                                                    @error('start_date')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="form-group">
                                                    <input class="form-control form-control-sm" type="date"
                                                        wire:model.defer="end_date">
                                                    @error('end_date')
                                                        <span class="text-danger text-message-validation">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <button type="submit"
                                                    class="btn bg-gradient-primary btn-sm">{{ __('forms.button.agregar') }}</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @error('comission')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <x-viatic-requests.observations :viaticRequest="$viaticRequest" />
                    </div>
                </div>
            </div>
            @if ($viaticRequest->user->id == auth()->user()->id)
                <button wire:click="$emit('beforeCreateViaticRequest')" type="button" name="next"
                    class="next action-button">Enviar</button>
            @endif
        </div>
    </div>
</div>
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteSiteDetalle', objId => {
            Swal.fire({
                title: '{{ __('forms.message.are_you_sure') }}',
                text: '{{ __('forms.message.before_delete') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('forms.yes_deleteled') }}',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-viatic-request.by-create', 'removeSite', objId);
                    Swal.fire(
                        '{{ __('forms.deleted') }}',
                        '{{ __('forms.message.delete') }}',
                        'success'
                    )
                }
            })
        });
    </script>
    <script>
        Livewire.on('beforeCreateViaticRequest', function() {
            Swal.fire({
                title: 'Se enviara de nuevo la solicitud',
                text: '¿Esta Seguro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-viatic-request.by-create', 'updateViaticRequest');
                }
            })
        });
        Livewire.on('requestSave', url => {
            Swal.fire(
                "Solicitud Enviada!",
                'Se creo correctamente la Solicitud, espera a que el jefe inmediato lo apruebe',
                'success'
            )
            window.location.replace(url);
        });
    </script>
@endpush
