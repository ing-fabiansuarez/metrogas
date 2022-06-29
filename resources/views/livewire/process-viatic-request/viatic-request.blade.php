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
            <div style="width: 75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0"
                aria-valuemax="100"></div>
        </div>
        <br>
        <!-- fieldsets -->
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">{{ __('messages.information_request') }}</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">{{ __('messages.step_1') }}</h2>
                    </div>
                </div>
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
                                                <x-selects.sites-origin />
                                                @error('origin')
                                                    <span class="text-danger text-message-validation">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </td>
                                            <td class="text-center">
                                                <x-selects.sites-destination />
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
            </div>
            <button wire:click="$emit('createViaticRequest')" type="button" name="next"
                class="next action-button">Crear</button>
        </fieldset>
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
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                    <textarea class="form-control form-control-sm" rows="3"
                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled></textarea>
                </div>

                <div class="table-responsive p-0">
                    <label for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
                    <div class="card bg-gray-100">
                        <div class="card-body p-2">
                            <table class="table align-items-center mb-0">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Destino # 1
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <select class="form-select form-select-sm"
                                                    aria-label=".form-select-sm example" disabled>
                                                    <option selected>FLORIDABLANDA</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <select class="form-select form-select-sm"
                                                    aria-label=".form-select-sm example" disabled>
                                                    <option selected>OCAÑA</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <input class="form-control form-control-sm" type="date" disabled>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="form-group">
                                                <input class="form-control form-control-sm" type="date" disabled>
                                            </div>
                                        </td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-0">
                    <label for="exampleFormControlTextarea1">{{ __('messages.rates') }}</label>
                    <div class="card bg-gray-100">
                        <div class="card-body p-2">
                            <table class="table align-items-center mb-0">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Destino # 1
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" class="form-control form-control-sm">
                                                    <span class="input-group-text py-0">$</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" class="form-control form-control-sm">
                                                    <span class="input-group-text py-0">$</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" class="form-control form-control-sm">
                                                    <span class="input-group-text py-0">$</span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" class="form-control form-control-sm">
                                                    <span class="input-group-text py-0">$</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" name="next" class="next action-button" value="Aprobar" />
            <input type="button" name="previous" class="previous action-button-previous" value="Rechazar" />
        </fieldset>
        <fieldset>
            <div class="form-card text-center">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">{{ __('messages.sign_aprove') }}</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Paso 3</h2>
                    </div>
                </div>
                <p>En esta sección se debe imprimir el documento, firmarlo y luego subirlo para poder
                    continuar con el proceso.</p>

                <button type="button" class="btn bg-gradient-secondary">imprimir Documento</button>
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control form-control-sm">

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <input type="button" name="next" class="next action-button" value="Enviar" />
            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
        </fieldset>
        <fieldset>
            <div class="form-card text-center">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">{{ __('messages.sign_aprove') }}</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Paso 4</h2>
                    </div>
                </div>


            </div>

            <input type="button" name="next" class="next action-button" value="Submit" />
            <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
        </fieldset>
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Finish:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Paso 5</h2>
                    </div>
                </div>
                <br><br>
                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                <br>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                    </div>
                </div>
                <br><br>
                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                    </div>
                </div>
            </div>
        </fieldset>
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
                    Livewire.emitTo('process-viatic-request.viatic-request', 'removeSite', objId);
                    Swal.fire(
                        '{{ __('forms.deleted') }}',
                        '{{ __('forms.message.delete') }}',
                        'success'
                    )
                }
            })
        });
    </script>
    <script></script>
@endpush
