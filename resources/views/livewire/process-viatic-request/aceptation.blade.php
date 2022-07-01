<div class="card px-3 pt-4 pb-0 mt-0 mb-3">
    <div id="msform">
        <!-- progressbar -->
        <ul id="progressbar" class="px-0">
            <li class="active" id="account"><strong>{{ __('messages.viatic_request') }}</strong> </li>
            <li class="active" id="personal"><strong>{{ __('messages.aprove_boss') }}</strong></li>
            <li class="active" id="payment"><strong>{{ __('messages.sign_aprove') }}</strong></li>
            <li id="boss"><strong>{{ __('messages.general_aprove') }}</strong></li>
            <li id="confirm"><strong>{{ __('messages.legalization') }}</strong></li>
        </ul>
        <div class="progress">
            <div style="width: 60%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                aria-valuemin="0" aria-valuemax="100"></div>
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
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                    <textarea class="form-control form-control-sm" rows="3"
                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled>{{ $viaticRequest->justification }}</textarea>
                </div>

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
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="fileuplo">Debes subir firmado el archivo que se imprime.</label>
                        <input class="form-control form-control-sm" type="file" />
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>


            <button wire:click="$emit('beforeAproveViaticRequest')" name="next"
                class="btn bg-secundary btn-sm action-button">Enviar</button>
            <a href="{{ route('viatic.pdf', $viaticRequest->id) }}"
                class="btn bg-primary btn-sm action-button">impirmir</a>
            {{-- <input type="button" name="previous" class="btn previous action-button-previous" value="Rechazar" /> --}}
        </fieldset>
    </div>
</div>
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
