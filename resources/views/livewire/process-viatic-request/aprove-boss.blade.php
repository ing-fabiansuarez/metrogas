<div class="card px-3 pt-4 pb-0 mt-0 mb-3">
    <div id="msform">
        <!-- progressbar -->
        <ul id="progressbar" class="px-0">
            <li class="active" id="account"><strong>{{ __('messages.viatic_request') }}</strong> </li>
            <li class="active" id="personal"><strong>{{ __('messages.aprove_boss') }}</strong></li>
            <li id="payment"><strong>{{ __('messages.sign_aprove') }}</strong></li>
            <li id="boss"><strong>{{ __('messages.general_aprove') }}</strong></li>
            <li id="confirm"><strong>Tesoreria y Dirección Financiera</strong></li>
            <li id="confirm"><strong>{{ __('messages.legalization') }}</strong></li>
        </ul>
        <div class="progress">
            <div style="width: 33.2%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">{{ __('messages.aprove_boss') }}</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">{{ __('messages.step_2') }}</h2>
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
                    <label for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                    <textarea class="form-control form-control-sm" rows="3"
                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled>{{ $viaticRequest->justification }}</textarea>
                </div>

                {{-- informacion sobre la comision --}}
                <div class="table-responsive p-0">
                    <label for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
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
                                            <input type="number" class="form-control form-control-sm"
                                                wire:model="viaticRequest.sites.{{ $index }}.accommodation_value">
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <input type="number" class="form-control form-control-sm"
                                                wire:model="viaticRequest.sites.{{ $index }}.feeding_value">
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <input type="number" class="form-control form-control-sm"
                                                wire:model="viaticRequest.sites.{{ $index }}.intermunicipal_trans_value">
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="input-group">
                                            <input type="number" class="form-control form-control-sm"
                                                wire:model="viaticRequest.sites.{{ $index }}.municipal_trans_value">
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($viaticRequest->sites[$index]->total_value) }}</button>
                                            <span class="input-group-text py-0">$</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            @foreach ($listOtherExpenses as $otherExpense)
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
                                            {{ $otherExpense['name_otro_gasto'] }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="input-group">
                                            <button class="form-control form-control-sm"
                                                disabled>{{ number_format($otherExpense['cantidad_otro_gasto']) }}</button>
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
                                        TOTAL ANTICIPOS
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="input-group">
                                        <button type="number" class="form-control form-control-sm"
                                            disabled>{{ number_format($totalAnticipo) }}</button>
                                        <span class="input-group-text py-0">$</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">
                                    <span class="text-secondary text-xs">
                                        OTROS GASTOS
                                    </span>
                                </td>
                                <td class="text-center">
                                    <select wire:model.defer="tipo_otro_gasto" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example">
                                        <option value="" selected>{{ __('forms.select.selected') }}
                                        </option>
                                        @foreach ($other_expense as $other)
                                            <option value="{{ $other->id }}">{{ $other->name }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td class="text-center">
                                    <div class="input-group">
                                        <input wire:model.defer="cantidad_otro_gasto" type="number"
                                            class="form-control form-control-sm">
                                        <span class="input-group-text py-0">$</span>

                                    </div>
                                </td>
                                <td>
                                    <button wire:click="$emit('addOtherExpenses')" type="submit"
                                        class="btn bg-gradient-primary btn-sm my-0">Agregar</button>
                                </td>
                                <td class="text-center">
                                </td>
                                <td class="text-center">
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

                <div class="row">
                    <div class="col-md-6">
                        {{-- Gestion --}}
                        <div class="form-group">
                            <label>Gestión</label>
                            <x-selects.other-items />

                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- Observacion --}}
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Observación</label>
                            <textarea wire:model="observation" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <button wire:click="$emit('beforeAproveViaticRequest')" name="next"
                class="btn bg-secundary btn-sm action-button">Aprobar</button>
            <input type="button" name="previous" class="btn previous action-button-previous" value="Rechazar" />
        </fieldset>
    </div>
</div>
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                    Livewire.emitTo('process-viatic-request.aprove-boss', 'aproveViaticRequest');
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
    </script>
    <script>
        document.addEventListener('livewire:load', function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-multiple').on('change', function() {
                @this.set('gestion', $(this).val());
            });
        });
    </script>
@endpush
