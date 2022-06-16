<div>
    <div class="card mb-1 mx-1">
        <div class="card-header pb-0 px-3 pt-3">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">{{ __('forms.jobtitle') }}</h5>
                </div>
                @livewire('jobtitle.create-jobtitle')

            </div>
            <div class="col-md-3 form-group mb-0 mt-1">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        placeholder="{{ __('forms.search') }}" aria-describedby="inputGroup-sizing-sm"
                        wire:model="search">
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
                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                        data-bs-original-title="Edit user">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    <span>
                                        <i class="cursor-pointer fas fa-trash text-secondary"></i>
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
