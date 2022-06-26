<!-- Modal update -->
<div wire:ignore.self class="modal fade" id="modal_edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form wire:submit.prevent="update">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('forms.origin_site.title.new') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div wire:loading.remove class="form-group">
                        <label for="recipient-name" class="col-form-label">{{ __('forms.origin_site.name') }}</label>
                        <input wire:model.defer="model.name" type="text" class="form-control" id="recipient-name">
                        @error('model.name')
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
