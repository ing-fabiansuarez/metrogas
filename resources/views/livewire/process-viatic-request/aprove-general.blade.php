<div>
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <ul id="progressbar" class="px-0">
                <li class="active" id="account"><strong>{{ __('messages.viatic_request') }}</strong> </li>
                <li class="active" id="personal"><strong>{{ __('messages.aprove_boss') }}</strong></li>
                <li class="active" id="payment"><strong>{{ __('messages.sign_aprove') }}</strong></li>
                <li class="active" id="boss"><strong>{{ __('messages.general_aprove') }}</strong></li>
                <li id="confirm"><strong>Tesoreria y Dirección Financiera</strong></li>
                <li id="confirm"><strong>{{ __('messages.legalization') }}</strong></li>
            </ul>
            <div class="progress">
                <div style="width: 66.4%" class="progress-bar progress-bar-striped progress-bar-animated"
                    role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <br>
            <fieldset>
                <div class="form-card">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="fs-title">Aceptación Empleado</h2>
                        </div>
                        <div class="col-5">
                            <h2 class="steps">Paso N° 3</h2>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <div>
                                <span style="font-size: 1rem;color:black;"> <b>Solicitud N°
                                        {{ $viaticRequest->id }}</b></span>
                            </div>
                            <br>
                            <span style="font-size: 1rem">{{ $viaticRequest->user->name }}</span><br>
                            <span style="font-size: 0.8rem">{{ $viaticRequest->user->jobtitle->name }}</span><br>
                            <span style="font-size: 0.8rem">NIVEL {{ $viaticRequest->user->jobtitle->level }}</span>


                        </div>

                    </div>

                    {{-- justificacion --}}
                    <div class="form-group">
                        <label
                            for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                        <textarea class="form-control form-control-sm" rows="3"
                            placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled>{{ $viaticRequest->justification }}</textarea>
                    </div>

                    {{-- comision --}}
                    <div class="table-responsive p-0">
                        <label
                            for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
                        <div class="card bg-gray-100">
                            <div class="card-body p-2">
                                <table class="table table-hover table-bordered align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>

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
                                                N° dias
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viaticRequest->sites as $index => $site)
                                            <tr>
                                                <td>
                                                    <span class="text-secondary text-xs">
                                                        Destino {{ $index + 1 }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs">
                                                        {{ $site->originSite->name }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs">
                                                        {{ $site->destinationSite->name }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <span class="text-secondary text-xs">
                                                        {{ $site->start_date }}
                                                    </span>
                                                </td>

                                                <td class="text-center">
                                                    <span class="text-secondary text-xs">
                                                        {{ $site->end_date }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-secondary text-xs">
                                                        {{ $site->calculateNumDays() }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- tarifas --}}
                    <div class="table-responsive p-0">
                        <label for="exampleFormControlTextarea1">{{ __('messages.rates') }}</label>

                        <table class="table table-hover table-bordered align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.accommodation') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.feeding') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.intermunicipal_transport') }}
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ __('messages.municipal_transport') }}
                                    </th>
                                    <th style="width: 15%"
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viaticRequest->sites as $index => $site)
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-xs">
                                                Destino {{ $index + 1 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($site->accommodation_value) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($site->feeding_value) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($site->intermunicipal_trans_value) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>

                                        <td class="text-center">

                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($site->municipal_trans_value) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($site->total_value) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach ($viaticRequest->otherExpenses as $otherExpense)
                                    <tr>
                                        <td>
                                        </td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs">
                                                {{ $otherExpense->name }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($otherExpense->pivot->value) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs">
                                            TOTAL ANTICIPO
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button type="number" class="form-control form-control-sm"
                                                disabled>{{ number_format($viaticRequest->getTotalViaticRequest()) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>

                        </table>
                        @error('tipo_otro_gasto')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                            <br>
                        @enderror

                        @error('cantidad_otro_gasto')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- gestion y observaciones --}}
                    <div class="row mt-3">
                        <div class="col-md-3">
                            {{-- Gestion --}}
                            <label class="mb-2">Gestión</label>
                            <ul class="list-group">
                                @foreach ($viaticRequest->otherItems as $item)
                                    <li style="color: black;font-size: 0.8rem" class="list-group-item">
                                        {{ $item->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            {{-- Observacion --}}
                            <label class="mb-2">Observaciones</label>
                            @foreach ($viaticRequest->observations as $obs)
                                <div class="card bg-gray-200">
                                    <div class="card-body p-3">
                                        <p style="font-size: 0.8rem" class="card-description mb-1">
                                            {{ $obs->message }}
                                        </p>
                                        <div class="author align-items-center">
                                            <div class="avatar shadow mx-2">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                    y="0px" viewBox="0 0 488.4 488.4"
                                                    style="enable-background:new 0 0 488.4 488.4;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M416.2,73.398h-65.5c-39.9,0-72.2,32.3-72.2,72.2c0,31.9,20.7,58.9,49.4,68.5v34.4c0,3.2,3.9,4.8,6.1,2.5l33.2-33.2h49
                                                    c39.9,0,72.2-32.3,72.2-72.2C488.4,105.798,456,73.398,416.2,73.398z M362.7,154.598h-17.9v-17.9h17.9V154.598z M392.4,154.598
                                                    h-17.9v-17.9h17.9V154.598z M422,154.598h-17.9v-17.9H422V154.598z" />
                                                            <path
                                                                d="M329.1,347.598c-43.5-35.8-90.5-59.6-100.1-64.2c-1.1-0.5-1.7-1.6-1.7-2.8v-33.2c5.1-8.8,8.4-18.1,9.7-26.6
                                                    c3.7-0.3,8.6-5.5,13.9-24.1c6.8-23.9,0.5-28.7-5.7-28.7c0.6-2,1.1-4.1,1.4-6.1c11-65.9-21.5-68.2-21.5-68.2s-5.4-10.3-19.5-18.2
                                                    c-9.5-5.6-22.7-10-40.1-8.5c-5.6,0.3-11,1.4-16,3l0,0c-6.4,2.2-12.3,5.3-17.6,9c-6.5,4.1-12.7,9.2-18.1,15
                                                    c-8.6,8.8-16.2,20.1-19.6,34.3c-2.8,10.6-2.2,21.6,0.2,33.5l0,0c0.4,2,0.9,4.1,1.4,6.1c-6.1,0.1-12.1,5.1-5.4,28.6
                                                    c5.3,18.6,10.2,23.8,13.9,24.1c1.3,8.4,4.6,17.7,9.7,26.6v33.2c0,1.2-0.7,2.3-1.7,2.8c-9.5,4.7-56.5,28.4-100.1,64.2
                                                    c-7.8,6.4-12.2,16.1-12.2,26.2v48.1h341.5v-48.1C341.3,363.698,336.9,354.098,329.1,347.598z" />
                                                        </g>
                                                    </g>
                                                </svg>

                                            </div>
                                            <div class="name ps-1">
                                                <span style="font-size: 0.7rem">{{ $obs->createBy->name }}</span>
                                                <div style="font-size: 0.7rem" class="stats">
                                                    <small>{{ $obs->createBy->jobtitle->name }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            <br>
                            @if ($viaticRequest->canAproveGeneral())
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tu observación</label>
                                    <textarea wire:model="observation" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                                </div>
                            @endif
                        </div>
                    </div>


                </div>
                <br>

                {{-- descargar anticipo --}}
                <div class="row">
                    <div class="col-md-6">
                        <a target="_blank" href="{{ Storage::url($viaticRequest->url_aceptation) }}"
                            style="color: white" type="button" class="btn bg-secundary btn-sm">Ver
                            Anticipo</a>
                    </div>
                </div>
                @if ($viaticRequest->canAproveGeneral())
                    <button wire:click="$emit('beforeAproveViaticRequest')" type="submit" name="next"
                        class="btn bg-secundary btn-sm action-button">Aprobar</button>
                    <button type="button" class="btn bg-warning action-button" data-bs-toggle="modal"
                        data-bs-target="#rechazarModal">
                        Rechazar
                    </button>
                    <button type="button" class="btn bg-danger action-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Anular
                    </button>
                @endif
                {{-- <input type="button" name="previous" class="btn previous action-button-previous" value="Rechazar" /> --}}
            </fieldset>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anular Solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>¿Por qué se Anulará?</label>
                        <textarea wire:model.defer="obsCanceled" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                        @error('obsCanceled')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button wire:click="$emit('canceledRequest')" type="button" style="color: white"
                        class="btn bg-danger">Anular</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="rechazarModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rechazar Solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>¿Por qué se Rechazara?</label>
                        <textarea wire:model.defer="obsRechazar" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                        @error('obsRechazar')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button wire:click="$emit('rechazarRequest')" type="button" style="color: white"
                        class="btn bg-warning">Rechazar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('beforeAproveViaticRequest', function() {
            Swal.fire({
                title: 'Se Aprobará la solicitud',
                text: '¿Esta Seguro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-viatic-request.aprove-general', 'aproveViaticRequest');
                }
            })
        });
        Livewire.on('responseAprove', function(status, route) {
            if (status) {
                Swal.fire(
                    "Solicitud Aprobada!",
                    'Se Aprobó correctamente',
                    'success'
                )
                window.location.replace(route);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo establecer la conexión',
                })
            }
        });
        Livewire.on('responseCanceled', function(status, route) {
            if (status) {
                Swal.fire(
                    "Solicitud Cancelada!",
                    'Se Cancelo correctamente',
                    'success'
                )
                window.location.replace(route);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo establecer la conexión',
                })
            }
        });
        Livewire.on('responseRechazado', function(status, route) {
            if (status) {
                Swal.fire(
                    "Solicitud Rechazada!",
                    'Se rechazó correctamente',
                    'success'
                )
                window.location.replace(route);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo establecer la conexión',
                })
            }
        });
    </script>
@endpush
