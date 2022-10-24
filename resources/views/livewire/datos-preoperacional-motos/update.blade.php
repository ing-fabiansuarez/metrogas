<!-- Modal update -->
<div wire:ignore.self class="modal fade" id="modal_edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit.prevent="update">
                <div class="modal-header">
                    <h5 class="modal-title">Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-form-label">Número Cedula</label>
                        <input wire:model.defer="model.cedula" type="text" class="form-control">
                        @error('model.cedula')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nombre Completo</label>
                        <input wire:model.defer="model.nombre_completo" type="text" class="form-control">
                        @error('model.nombre_completo')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Correo Electronico</label>
                        <input wire:model.defer="model.correo" type="text" class="form-control">
                        @error('model.correo')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Lugar de Trabajo</label>
                        <input wire:model.defer="model.lugar_trabajo" type="text" class="form-control">
                        @error('model.lugar_trabajo')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Area</label>
                        <input wire:model.defer="model.area" type="text" class="form-control">
                        @error('model.area')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Placa Vehiculo</label>
                        <input wire:model.defer="model.placa_vehiculo" type="text" class="form-control">
                        @error('model.placa_vehiculo')
                            <span class="text-danger text-message-validation">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Modelo</label>
                        <input wire:model.defer="model.modelo" type="text" class="form-control">
                        @error('model.modelo')
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
                        class="btn bg-gradient-primary">{{ __('forms.update') }}</button>
                    <span wire:loading>{{ __('forms.message.loading') }}</span>
                </div>
            </form>
        </div>
    </div>
</div>

@push('js')
    <script>
        window.addEventListener('close-modal-edit', event => {
            $('#modal_edit').modal('hide');
        });
    </script>
@endpush
