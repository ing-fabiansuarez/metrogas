<div>
    <div class="alert alert-success" role="alert">
        <strong>Usuarios que pueden aprobar:</strong><br>
        @foreach ($legalization->bosses() as $user)
            {{ $user->name . ' (' . $user->jobtitle->name . ')' }} <br>
        @endforeach
        @if (count($legalization->bosses()) <= 0)
            Aún no hay usuarios registrados que puedan autorizar, por favor dile a tu jefe inmediato que inicie
            sesión.
        @endif
    </div>
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
                <h2 class="steps">Paso N° 3</h2>
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
                        Total Anticipo: $
                        <p>{{ number_format($legalization->viaticRequest->getTotalViaticRequest()) }}</p>
                    @endif
                    <br>
                    Total Legalización :<p id="totalLegalization"> $
                        {{ number_format($legalization->calculateTotal()) }}</p>

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
                                @foreach ($legalization->supports as $support)
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
                                                <i class="cursor-pointer fas fa-eye text-secondary"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- Observations --}}
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <x-viatic.legalization.observations :legalization="$legalization" />
        </div>
    </div>

    <h2 class="my-3">Total Legalización $ {{ number_format($legalization->calculateTotal()) }}</h2>

    @if ($legalization->canAproveBoss())
        {{-- observation --}}
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Observación</label>
            <textarea wire:model.defer="observation" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
            @error('observation')
                <span class="text-danger text-message-validation">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button wire:click="$emit('beforeAprove')" name="next"
            class="btn bg-secundary btn-sm action-button">Aprobar</button>
        <button wire:click="$emit('beforeRechazar')" type="button" class="btn bg-warning action-button">
            Rechazar
        </button>
        <button wire:click="$emit('beforeCanceled')" type="button" class="btn bg-danger action-button">
            Anular
        </button>
    @endif
</div>


@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('beforeAprove', function() {
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
                    Livewire.emitTo('process-legalization.aprove-boss', 'aproveLegalization');
                }
            })
        });
        Livewire.on('beforeCanceled', function() {
            Swal.fire({
                title: 'Se Anulará la Legalización',
                text: '¿Esta Seguro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-legalization.aprove-boss', 'canceledLegalization');
                }
            })
        });
        Livewire.on('beforeRechazar', function() {
            Swal.fire({
                title: 'Se Rechazará la Legalización',
                text: '¿Esta Seguro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-legalization.aprove-boss', 'rechazarLegalization');
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
        Livewire.on('responseRechazar', function(status, route) {
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
