<div>
    <button class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal"
        data-bs-target="#modal-new-jobtitle">{{ __('forms.jobtitle.button.new_jobtitle') }}</button>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal-new-jobtitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('forms.jobtitle.title.new_jobtitle') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">{{ __('forms.jobtitle.name') }}</label>
                            <input wire:model.defer="name" type="text" class="form-control" id="recipient-name">
                            @error('name')
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

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-new-jobtitle').modal('hide');
        });
    </script>
@endpush
