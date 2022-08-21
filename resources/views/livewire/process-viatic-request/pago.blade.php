<div>
    <div class="card px-3 pt-4 pb-0 mt-0 mb-3">
        <div id="msform">
            <!-- progressbar -->
            <x-viatic-requests.progress-bar :stepsCompletes='6' />
            <br>

            <div class="alert alert-success" role="alert">
                <strong>Usuarios que pueden hacer el pago:</strong><br>
                @foreach ($viaticRequest->usersCanPagar() as $user)
                    {{ $user->name . ' (' . $user->jobtitle->name . ')' }} <br>
                @endforeach
                @if (count($viaticRequest->usersCanPagar()) <= 0)
                    Aún no hay usuario con Rol de Tesorero.
                @endif
            </div>

            <fieldset>
                <div class="form-card">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="fs-title">Pago</h2>
                        </div>
                        <div class="col-5">
                            <h2 class="steps">Paso N° 5</h2>
                        </div>
                    </div>

                    <x-viatic-requests.header-viatic-request :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.justification :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.comission :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.tarifas :viaticRequest="$viaticRequest" />

                    <x-viatic-requests.supports :viaticRequest="$viaticRequest" />

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
                </div>
                <br>

                {{-- descargar anticipo --}}
                <div class="row">
                    <div class="col-md-6">
                        {{-- <a target="_blank" href="{{ Storage::url($viaticRequest->url_aceptation) }}"
                            style="color: white" type="button" class="btn bg-secundary btn-sm">Ver
                            Anticipo</a> --}}
                        <a target="_blank" href="{{ route('viatic.pdf', $viaticRequest->id) }}" style="color: white"
                            type="button" class="btn bg-secundary btn-sm">Ver
                            Anticipo</a>
                    </div>
                </div>
                @if ($viaticRequest->canPagar())
                    <button wire:click="$emit('beforeAproveViaticRequest')" type="submit" name="next"
                        class="btn bg-secundary btn-sm action-button" wire:loading.attr="disabled">Realizado el Pago</button>
                    <button type="button" class="btn bg-warning action-button" data-bs-toggle="modal"
                        data-bs-target="#rechazarModal" wire:loading.attr="disabled">
                        Rechazar
                    </button>
                    <button type="button" class="btn bg-danger action-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" wire:loading.attr="disabled">
                        Anular
                    </button>
                    <div wire:loading>
                        Cargando...
                    </div>
                @endif
            </fieldset>
        </div>
    </div>
    <!-- Modales -->
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
                    Livewire.emitTo('process-viatic-request.pago', 'aproveViaticRequest');
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