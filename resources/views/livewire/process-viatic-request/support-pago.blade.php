<div>
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-viatic-requests.progress-bar :stepsCompletes='8' />
            <br>
            <div class="alert alert-success" role="alert">
                <strong>Usuarios que pueden aprobar:</strong><br>
                @foreach ($viaticRequest->usersCanUploadSupports() as $user)
                    {{ $user->name . ' (' . $user->jobtitle->name . ')' }} <br>
                @endforeach
                @if (count($viaticRequest->usersCanUploadSupports()) <= 0)
                    Aún no hay usuario con Rol de Auxiliar Tesoreria.
                @endif
            </div>
            <fieldset>
                <div class="form-card">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="fs-title">Subir Evidencia del Pago</h2>
                        </div>
                        <div class="col-5">
                            <h2 class="steps">Paso N° 8</h2>
                        </div>
                    </div>


                    <x-viatic-requests.header-viatic-request :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.justification :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.comission :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.tarifas :viaticRequest="$viaticRequest" />

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
                            <x-viatic-requests.observations :viaticRequest="$viaticRequest" />
                            <br>
                            @if ($viaticRequest->canPagar())
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Tu observación</label>
                                    <textarea wire:model="observation" class="form-control form-control-sm" rows="3" placeholder=""></textarea>
                                </div>
                                @error('observation')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            @endif
                        </div>
                    </div>

                    @if ($viaticRequest->canUploadSupports())
                        {{-- soportes --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive p-0">
                                    <label for="exampleFormControlTextarea1">SOPORTES</label>
                                    <div class="card bg-gray-100">
                                        <div class="card-body p-2">

                                            <table class="table table-hover table-bordered align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Id
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Creado Por
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Observacion
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                        </th>

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
                                                            <td class="text-center">
                                                                <span class="text-secondary text-xs">
                                                                    {{ $support->createdBy->name }}
                                                                    <br>
                                                                    <b> {{ $support->createdBy->jobtitle->name }}</b>
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <span class="text-secondary text-xs">
                                                                    {{ $support->observation }}
                                                                </span>
                                                            </td>

                                                            <td class="text-center">
                                                                <a target="_blank"
                                                                    href="{{ Storage::url($support->url) }}">
                                                                    <i
                                                                        class="cursor-pointer fas fa-eye text-secondary"></i>
                                                                </a>
                                                                @if ($support->type_support == $id_type_support_pago)
                                                                    <a
                                                                        wire:click="$emit('destroySupport',{{ $support->id }})">
                                                                        <i style="color: red"
                                                                            class="cursor-pointer fas fa-trash "></i>
                                                                    </a>
                                                                @endif

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>

                                                        <td>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <input wire:model.defer="newSupportFile"
                                                                    class="form-control form-control-sm pt-1"
                                                                    type="file" accept="image/*,.pdf" />
                                                                @error('newSupportFile')
                                                                    <span class="text-danger text-message-validation">
                                                                        {{ $message }}
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="input-group input-group-sm">
                                                                <input wire:model.defer="newSupportObs" type="text"
                                                                    class="form-control input-control-sm"
                                                                    placeholder="Observación">
                                                            </div>
                                                            @error('newSupportObs')
                                                                <span class="text-danger text-message-validation">
                                                                    {{ $message }}
                                                                </span>
                                                            @enderror
                                                        </td>
                                                        <td class="text-center">
                                                            <button wire:click="addSupport">
                                                                <i style="color: #b2ca01;font-size: 2rem"
                                                                    class="cursor-pointer fas fa-upload"></i> Subir
                                                            </button>
                                                        </td>
                                                    </tr>
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
                            </div>

                        </div>
                    @endif

                </div>
                <br>

                @if ($viaticRequest->canUploadSupports())
                    <button wire:click="$emit('beforeClose')" type="submit" name="next"
                        class="btn bg-secundary btn-sm action-button" wire:loading.attr="disabled">Cerrar Solicitud</button>
                    <div wire:loading>
                        Cargando...
                    </div>
                @endif

            </fieldset>
        </div>
    </div>


</div>
@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('beforeClose', function() {
            Swal.fire({
                title: 'Se cerrara la solicitud de anticipo',
                text: '¿Esta Seguro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: '{{ __('forms.close') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('process-viatic-request.support-pago', 'closeViaticRequest');
                }
            })
        });
        Livewire.on('responseAprove', function(status, route) {
            if (status) {
                Swal.fire(
                    "Solicitud Cerrada!",
                    'Se Cerró correctamente',
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

                    Livewire.emitTo('process-viatic-request.supports', 'destroySupport', objId);
                    Swal.fire(
                        '{{ __('forms.deleted') }}',
                        '{{ __('forms.message.delete') }}',
                        'success'
                    )
                }
            })
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
