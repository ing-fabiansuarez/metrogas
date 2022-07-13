<div>
    <!-- fieldsets -->
    <div>
        @if (session('msg'))
            <div class="alert {{ session('msg.class') }}" role="alert">
                {{ session('msg.body') }}
            </div>
        @endif
        {{-- informacion general --}}
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Información Legalización</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Paso N° 2</h2>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div>
                        <span style="font-size: 1rem;color:black;"> <b>Legalización N°
                                {{ $legalization->id }}</b></span>
                    </div>
                    <br>
                    <span style="font-size: 1rem">{{ $legalization->user->name }}</span><br>
                    <span style="font-size: 0.8rem">{{ $legalization->user->jobtitle->name }}</span><br>
                    <span style="font-size: 0.8rem">NIVEL {{ $legalization->user->jobtitle->level }}</span>
                </div>
            </div>

            <div class="form-group">
                <label>{{ __('forms.viatic_request.justificacion') }}</label>
                <textarea class="form-control form-control-sm" rows="3" disabled>{{ $legalization->justification }}</textarea>
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
                            <input type="radio" class="btn-check" id="btnradio1" value="1" autocomplete="off"
                                @if ($legalization->viatic_request_id != null) checked @endif disabled>
                            <label class="btn btn-outline-primary" for="btnradio1">Solicitud de anticipo</label>

                            <input type="radio" class="btn-check" id="btnradio2" value="2" autocomplete="off"
                                @if ($legalization->viatic_request_id == null) checked @endif disabled>
                            <label class="btn btn-outline-primary" for="btnradio2">Reintegro</label>
                        </div>

                        <br>
                        @if ($legalization->viatic_request_id != null)
                            <a target="_blank" href="{{ route('viatic.show', $legalization->viatic_request_id) }}">
                                Solicitud Anticipo N°
                                {{ $legalization->viatic_request_id }}</a><br>
                            Total Anticipo: 
                            <p>$ {{ number_format($legalization->viaticRequest->getTotalViaticRequest()) }}</p>
                        @endif
                        <br>
                        Total Legalización :<p id="totalLegalization"> $ {{ number_format($totalLegalization) }}</p>

                    </div>
                </div>
            </div>
        </div>

        {{-- tabla soportes --}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive p-0">
                    <label for="exampleFormControlTextarea1">SOPORTES</label>
                    <div class="card bg-gray-100">
                        <div class="card-body p-2">
                            <table class="table table-hover table-bordered align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Descripción
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fecha Factura
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tipo Identificación
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Número Identificación
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Razon Social / Nombre
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supports as $support)
                                        <tr>
                                            <td>
                                                <span class="text-secondary text-xs">
                                                    {{ $support->id }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="text-secondary text-xs">
                                                    {{ $support->observation }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $support->date_factura }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $support->typeIdentification->name }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $support->number_identification }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ $support->company }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-secondary text-xs">
                                                    {{ number_format($support->total_factura) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a target="_blank" href="{{ Storage::url($support->url) }}">
                                                    <i class="cursor-pointer fas fa-download text-secondary"></i>
                                                </a>
                                                <a wire:click="$emit('deleteSupport',{{ $support->id }})">
                                                    <i style="color: red" class="cursor-pointer fas fa-trash "></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @error('supportss')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @if (auth()->user()->id == $legalization->user->id)
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="exampleFormControlTextarea1">Subir Soporte</label>
                            <div class="form-group">
                                <input wire:model.defer="soporte" class="form-control form-control-sm pt-1"
                                    type="file" accept="image/*" />
                                @error('soporte')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label>Fecha Factura</label>
                                    <div class="input-group input-group-sm">
                                        <input wire:model.defer="fechaFactura" type="date"
                                            class="form-control input-control-sm" placeholder="Fecha Factura">
                                    </div>
                                    @error('fechaFactura')
                                        <span class="text-danger text-message-validation">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>Total Factura</label>
                                    <div class="input-group input-group-sm">
                                        <input wire:model.defer="totalFactura" type="number"
                                            class="form-control input-control-sm" placeholder="Total Factura">
                                    </div>
                                    @error('totalFactura')
                                        <span class="text-danger text-message-validation">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <label>Razon Social / Nombre</label>
                            <div class="input-group input-group-sm">
                                <input wire:model.defer="nombreEmpresa" type="text"
                                    class="form-control input-control-sm" placeholder="Nombre de la empresa">
                            </div>
                            @error('nombreEmpresa')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror


                            <div class="row">
                                <div class="col">
                                    <label>Tipo Identificación</label>
                                    <div class="form-group">
                                        <select wire:model.defer="tipoIdentificacion"
                                            class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option value="">{{ __('forms.select.selected') }}</option>
                                            @foreach ($TypeIdentifications as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->abrev . ' - ' . $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tipoIdentificacion')
                                            <span class="text-danger text-message-validation">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Número Identificación</label>
                                    <div class="input-group input-group-sm">
                                        <input wire:model.defer="numeroIdentificacion" type="text"
                                            class="form-control input-control-sm" placeholder="Número de Factura">
                                    </div>
                                    @error('numeroIdentificacion')
                                        <span class="text-danger text-message-validation">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <label>Descripción</label>
                            <div class="input-group input-group-sm">
                                <input wire:model.defer="descripcion" type="text"
                                    class="form-control input-control-sm" placeholder="Descripción">
                            </div>
                            @error('descripcion')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                            <br>
                            <button wire:click="$emit('saveSupport')" style="border: white">
                                <i style="color: #b2ca01;font-size: 2rem" class="cursor-pointer fas fa-upload"></i>
                            </button>
                        </div>
                    </div>
                    <button wire:click="$emit('beforeSend')" id="button_create" type="submit" name="next"
                        class="btn next action-button">Pasar
                        Aprobación</button>
                @endif
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('responseUpload', function(status) {
            if (status) {
                Swal.fire(
                    "Se subio el archivo correctamente!",
                    'Se subio correctamente',
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
        Livewire.on('deleteSupport', objId => {
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

                    Livewire.emitTo('process-legalization.supports', 'destroySupport', objId);
                    Swal.fire(
                        '{{ __('forms.deleted') }}',
                        '{{ __('forms.message.delete') }}',
                        'success'
                    )
                }
            })
        });
        Livewire.on('beforeSend', function() {
            Swal.fire({
                title: 'Total legalización: ' + $('#totalLegalization').text(),
                text: '¿Esta Seguro de enviar estos soportes?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-legalization.supports', 'sendSupports');
                }
            })
        });
        Livewire.on('responseSend', function(status, route) {
            if (status) {
                Swal.fire(
                    "Legalización enviada",
                    'Se Envió correctamente',
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
