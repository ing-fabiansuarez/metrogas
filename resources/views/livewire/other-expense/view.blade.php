<div>
    <div class="card mb-1">
        <div class="card-header pb-0 px-3 pt-3">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">{{ $title }}</h5>
                </div>

                @include('livewire.other-expense.create')
            </div>
            <div class="row">
                <div class="col-sm-3 form-group mb-0 mt-1">
                    <div class="input-group input-group-sm flex">
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            placeholder="{{ __('forms.search') }}" aria-describedby="inputGroup-sizing-sm"
                            wire:model="keyWord">

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
                                {{ __('forms.other_expense.id') }}
                            </th>

                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                {{ __('forms.other_expense.name') }}
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
                        @if (!$objetsModel->count())
                            <tr>
                                <td colspan="5">
                                    {{ __('forms.not_data') }}
                                </td>
                            </tr>
                        @endif
                        @foreach ($objetsModel as $object)
                            <tr>
                                <td class="ps-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $object->id }}
                                    </p>
                                </td>

                                <td class="text-center">
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{ $object->name }}
                                    </p>
                                </td>

                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        {{ $object->updated_at }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        {{ $object->created_at }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="mx-3" data-bs-toggle="modal"
                                        wire:click="edit({{ $object }})" data-bs-target="#modal_edit"
                                        data-bs-original-title="Edit">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <a wire:click="$emit('deletePost',{{ $object->id }})">
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $objetsModel->links() }}
            </div>
        </div>

    </div>
    <!-- Modal Editar -->
    @include('livewire.other-expense.update')

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
            Livewire.on('deletePost', objId => {
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

                        Livewire.emitTo('other-expense', 'destroy', objId);
                        Swal.fire(
                            '{{ __('forms.deleted') }}',
                            '{{ __('forms.message.delete') }}',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
