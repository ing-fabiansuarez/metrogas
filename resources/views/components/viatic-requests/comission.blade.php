<div class="table-responsive p-0">
    <label for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
    <div class="card bg-gray-100">
        <div class="card-body p-2">
            <table class="table table-hover table-bordered align-items-center mb-0">
                <thead>
                    <tr>
                        <th></th>

                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{ __('forms.viatic_request.origin_site') }}
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{ __('forms.viatic_request.destination_site') }}
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{ __('forms.viatic_request.start_date') }}
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            {{ __('forms.viatic_request.end_date') }}
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            N° dias
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viaticRequest->sites as $index => $site)
                        <tr>
                            <td>
                                <span class="text-secondary text-xs">
                                    Destino {{ $index + 1 }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs">
                                    {{ $site->originSite->name }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs">
                                    {{ $site->destinationSite->name }}
                                </span>
                            </td>

                            <td class="text-center">
                                <span class="text-secondary text-xs">
                                    {{ $site->start_date }}
                                </span>
                            </td>

                            <td class="text-center">
                                <span class="text-secondary text-xs">
                                    {{ $site->end_date }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="text-secondary text-xs">
                                    {{ $site->calculateNumDays() }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
