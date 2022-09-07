<div>
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-viatic-requests.progress-bar :stepsCompletes='1' />
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Centro de costos</label>
                                <select wire:model.defer="centroDeCostos" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option value="" selected>{{ __('forms.select.selected') }}
                                    </option>
                                    @foreach ($centroDeCostosDB as $centro)
                                        <option value="{{ $centro->id }}">{{ $centro->name }}</option>
                                    @endforeach
                                </select>
                                @error('centroDeCostos')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Número de Cedula (Sin puntos ni caracteres especiales)</label>
                                <input wire:model.defer="numeroIdentificacion" type="number"
                                    class="form-control form-control-sm">
                                @error('numeroIdentificacion')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
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
                                @foreach ($listTarifas as $index => $tarifa)
                                    <tr>
                                        <td>
                                            <span class="text-secondary text-xs">
                                                Destino {{ $index + 1 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-sm"
                                                    wire:model="listTarifas.{{ $index }}.alojamiento">
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <input type="number"
                                                    wire:model="listTarifas.{{ $index }}.alimentacion"
                                                    class="form-control form-control-sm">
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-sm"
                                                    wire:model="listTarifas.{{ $index }}.trans_intermunicipal">
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <div class="input-group">
                                                <input type="number" class="form-control form-control-sm"
                                                    wire:model="listTarifas.{{ $index }}.trans_municipal">
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="input-group">
                                                <button class="form-control form-control-sm"
                                                    disabled>{{ number_format($tarifa['total']) }}</button>
                                                <span class="input-group-text py-0">$</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($listOtherExpenses != null)
                                    @foreach ($listOtherExpenses as $index => $otherExpense)
                                        <tr>
                                            <td>
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center">
                                                <a wire:click="$emit('removeOtherExpense',{{ $index }})">
                                                    <i
                                                        class="cursor-pointer fas fa-trash text-secondary text-danger"></i>
                                                </a>
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
                                @endif

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
                                <label>Gestión</label><br>
                                <ul>
                                    @foreach ($nameGestion as $itemName)
                                        <li>{{ $itemName }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="form-group">
                                <select wire:model="gestion" style="width: 100%" multiple>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input wire:model="aceptarTerminosCondiciones" class="form-check-input" type="checkbox"
                            id="fcustomCheck1" required>
                        <label class="custom-control-label" for="customCheck1">Acepto términos y condiciones de
                            MetroGas SA ESP</label>
                        @error('aceptarTerminosCondiciones')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                            <br>
                        @enderror
                    </div>
                </div>

                <div wire:loading>
                    Cargando...
                </div>
                <button wire:click="$emit('beforeCreateViaticRequest')" type="button" name="next"
                    class="next action-button " wire:loading.attr="disabled">Crear</button>
            </div>
        </div>
    </div>
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('livewire:load', function() {
                $('.js-example-basic-multiple').select2();
                $('.js-example-basic-multiple').on('change', function() {
                    @this.set('gestion', $(this).val());
                });
            });
        </script>
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
        <script>
            Livewire.on('beforeCreateViaticRequest', function() {
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
                        Livewire.emitTo('process-viatic-request.viatic-request', 'createViaticRequest');
                    }
                })
            });
            Livewire.on('requestSave', url => {
                Swal.fire(
                    "Solicitud creada!",
                    'Se creo correctamente la Solicitud, espera a que el jefe inmediato lo apruebe',
                    'success'
                )
                window.location.replace(url);
            });
        </script>
    @endpush
</div>
