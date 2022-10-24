<!-- Modal -->
<div>
    <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modal-new-obj">
        Nuevo {{ $title }}</button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal-new-obj">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title"> Nuevo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label">Número Cedula</label>
                            <input wire:model.defer="cedula" type="text" class="form-control">
                            @error('cedula')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nombre Completo</label>
                            <input wire:model.defer="nombre_completo" type="text" class="form-control">
                            @error('nombre_completo')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Correo Electronico</label>
                            <input wire:model.defer="correo" type="text" class="form-control">
                            @error('correo')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Lugar de Trabajo</label>
                            <input wire:model.defer="lugar_trabajo" type="text" class="form-control">
                            @error('lugar_trabajo')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Area</label>
                            <input wire:model.defer="area" type="text" class="form-control">
                            @error('area')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Placa Vehiculo</label>
                            <input wire:model.defer="placa_vehiculo" type="text" class="form-control">
                            @error('placa_vehiculo')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Modelo</label>
                            <input wire:model.defer="modelo" type="text" class="form-control">
                            @error('modelo')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary"
                            data-bs-dismiss="modal">{{ __('forms.close') }}</button>
                        <button wire:loading.remove type="submit"
                            class="btn bg-gradient-primary">{{ __('forms.save') }}</button>
                        <span wire:loading wire:target="store">{{ __('forms.message.loading') }}</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@push('js')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-new-obj').modal('hide');
        });
    </script>
@endpush
