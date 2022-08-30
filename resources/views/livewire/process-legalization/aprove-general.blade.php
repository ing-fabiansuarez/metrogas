<div>

    <div class="alert alert-success" role="alert">
        <strong>Usuarios que pueden aprobar:</strong><br>
        @foreach ($legalization->usersCanAproveGeneral() as $user)
            {{ $user->name . ' (' . $user->jobtitle->name . ')' }} <br>
        @endforeach
        @if (count($legalization->usersCanAproveGeneral()) <= 0)
            Aún no hay usuarios registrados que puedan autorizar.
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
                <h2 class="steps">Paso N° 4</h2>
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
                                    <th></th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total
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
                                        Descripción
                                    </th>
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
                                        <td class="text-center">
                                            <a target="_blank" href="{{ Storage::url($support->url) }}">
                                                <i class="cursor-pointer fas fa-eye text-secondary"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs">
                                                {{ number_format($support->total_factura) }}
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

                                        <td>
                                            <span class="text-secondary text-xs">
                                                {{ $support->observation }}
                                            </span>
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

    <br>
    <div class="row">
        <div class="col-md-6">
            <a target="_blank" href="{{ route('legalization.pdf', $legalization->id) }}" style="color: white"
                type="button" class="btn bg-secundary btn-sm">Ver
                Legalización</a>
        </div>
    </div>

    <h2 class="my-3">Total Legalización $ {{ number_format($legalization->calculateTotal()) }}</h2>

    {{-- observation --}}

    <div class="row mt-3 justify-content-center">
        <div class="col-md-8">
            {{-- Observacion --}}
            <label class="mb-2">Observaciones</label>
            @foreach ($legalization->observations as $obs)
                <div class="card bg-gray-200">
                    <div class="card-body p-3">
                        <p style="font-size: 0.8rem" class="card-description mb-1">
                            {{ $obs->message }}
                        </p>
                        <div class="author align-items-center">
                            <div class="avatar shadow mx-2">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 488.4 488.4" style="enable-background:new 0 0 488.4 488.4;"
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

            @if ($legalization->canAproveGeneral())
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Su Observación</label>
                    <textarea wire:model.defer="observation" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                    @error('observation')
                        <span class="text-danger text-message-validation">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div wire:loading>
                    Cargando...
                </div>

                <button wire:click="$emit('beforeAprove')" name="next"
                    class="btn bg-secundary btn-sm action-button" wire:loading.attr="disabled">Aprobar</button>
                <button wire:click="$emit('beforeRechazar')" type="button" class="btn bg-warning action-button"
                    wire:loading.attr="disabled">
                    Rechazar
                </button>
                {{-- <button wire:click="$emit('beforeCanceled')" type="button" class="btn bg-danger action-button"
                    wire:loading.attr="disabled">
                    Anular
                </button> --}}
            @endif

        </div>
    </div>


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
                    Livewire.emitTo('process-legalization.aprove-general', 'aproveLegalization');
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
                    Livewire.emitTo('process-legalization.aprove-general', 'canceledLegalization');
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
                    Livewire.emitTo('process-legalization.aprove-general', 'rechazarLegalization');
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
