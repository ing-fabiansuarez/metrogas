<div>
    <div class="card mb-1 mx-1">
        <div class="card-header pb-0 px-3 pt-3">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">{{ __('forms.jobtitle') }}</h5>
                </div>
                @livewire('jobtitle.create-jobtitle')

            </div>
            <div class="row">
                <div class="col-sm-3 form-group mb-0 mt-1">
                    <div class="input-group input-group-sm flex">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            placeholder="{{ __('forms.search') }}" aria-describedby="inputGroup-sizing-sm"
                            wire:model="search">

                    </div>
                </div>
                <div class="col form-group mb-0 mt-1">
                    <div class="flex items-center">
                        <span style="font-size: 0.7rem">Mostrar</span>
                        <select wire:model="cantEntradas" style="font-size: 0.8rem">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span style="font-size: 0.7rem">entradas</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.jobtitle.id') }}
                            </th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.jobtitle.name') }}
                            </th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.jobtitle.boss') }}
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.jobtitle.level') }}
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.updated_at') }}
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.created_at') }}
                            </th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$jobtitles->count())
                            <tr>
                                <td colspan="5">
                                    {{ __('forms.not_data') }}
                                </td>
                            </tr>
                        @endif
                        @foreach ($jobtitles as $jobtitle)
                            <tr>
                                <td class="ps-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $jobtitle->id }}
                                    </p>
                                </td>

                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $jobtitle->name }}
                                    </p>
                                </td>

                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $jobtitle->boss->name }}
                                    </p>
                                </td>

                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $jobtitle->level }}
                                    </p>
                                </td>


                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        {{ $jobtitle->updated_at }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        {{ $jobtitle->created_at }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="mx-3" data-bs-toggle="modal"
                                        wire:click="edit({{ $jobtitle }})" data-bs-target="#modal_edit_jobtitle"
                                        data-bs-original-title="Edit user">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a wire:click="$emit('deletePost',{{ $jobtitle->id }})">
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $jobtitles->links() }}
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal_edit_jobtitle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form wire:submit.prevent="update">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('forms.jobtitle.title.new_jobtitle') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div wire:loading.remove class="form-group">
                            <label for="recipient-name"
                                class="col-form-label">{{ __('forms.jobtitle.name') }}</label>
                            <input wire:model.defer="jobtitle.name" type="text" class="form-control"
                                id="recipient-name">
                            @error('jobtitle.name')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror



                            <div class="form-group">
                                <label for="recipient-name"
                                    class="col-form-label">{{ __('forms.jobtitle.boss') }}</label>
                                <select wire:model.defer="jobtitle.id_boss" class="form-select"
                                    aria-label=".form-select-sm example">
                                    @foreach ($allJobtitles as $job)
                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                    @endforeach
                                </select>
                                @error('jobtitle.id_boss')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="recipient-name"
                                    class="col-form-label">{{ __('forms.jobtitle.level') }}</label>
                                <select wire:model.defer="jobtitle.level" class="form-select"
                                    aria-label=".form-select-sm example">
                                    <option value="1">NIVEL I</option>
                                    <option value="2">NIVEL II</option>
                                    <option value="3">NIVEL III</option>

                                </select>
                                @error('jobtitle.level')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
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
        {{-- mesajes --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('alert', function(title, message) {
                Swal.fire(
                    title,
                    message,
                    'success'
                )
            });
        </script>
        <script>
            Livewire.on('deletePost', jobtitleId => {
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

                        Livewire.emitTo('show-jobtitles', 'delete', jobtitleId);
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
            window.addEventListener('close-modal', event => {
                $('#modal_edit_jobtitle').modal('hide');
            });
        </script>
    @endpush
</div>
