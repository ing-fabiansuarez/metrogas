<div class="table-responsive p-0">
    <label for="exampleFormControlTextarea1">{{ __('messages.rates') }}</label>

    <table class="table table-hover table-bordered align-items-center mb-0">
        <thead>
            <tr>
                <th></th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ __('messages.accommodation') }}
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ __('messages.feeding') }}
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ __('messages.intermunicipal_transport') }}
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ __('messages.municipal_transport') }}
                </th>
                <th style="width: 15%"
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Total
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
                        <div class="input-group">
                            <button class="form-control form-control-sm"
                                disabled>{{ number_format($site->accommodation_value) }}</button>
                            <span class="input-group-text py-0">$</span>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="input-group">
                            <button class="form-control form-control-sm"
                                disabled>{{ number_format($site->feeding_value) }}</button>
                            <span class="input-group-text py-0">$</span>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="input-group">
                            <button class="form-control form-control-sm"
                                disabled>{{ number_format($site->intermunicipal_trans_value) }}</button>
                            <span class="input-group-text py-0">$</span>
                        </div>
                    </td>

                    <td class="text-center">

                        <div class="input-group">
                            <button class="form-control form-control-sm"
                                disabled>{{ number_format($site->municipal_trans_value) }}</button>
                            <span class="input-group-text py-0">$</span>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="input-group">
                            <button class="form-control form-control-sm"
                                disabled>{{ number_format($site->total_value) }}</button>
                            <span class="input-group-text py-0">$</span>
                        </div>
                    </td>
                </tr>
            @endforeach

            @foreach ($viaticRequest->otherExpenses as $otherExpense)
                <tr>
                    <td>
                    </td>
                    <td class="text-center">
                    </td>
                    <td class="text-center">
                    </td>
                    <td class="text-center">
                    </td>
                    <td class="text-center">
                        <span class="text-secondary text-xs">
                            {{ $otherExpense->name }}
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="input-group">
                            <button class="form-control form-control-sm"
                                disabled>{{ number_format($otherExpense->pivot->value) }}</button>
                            <span class="input-group-text py-0">$</span>
                        </div>
                    </td>
                </tr>
            @endforeach

            <tr>
                <td>
                </td>
                <td class="text-center">
                </td>
                <td class="text-center">
                </td>
                <td class="text-center">
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs">
                        TOTAL ANTICIPO
                    </span>
                </td>
                <td class="text-center">
                    <div class="input-group">
                        <button type="number" class="form-control form-control-sm"
                            disabled>{{ number_format($viaticRequest->getTotalViaticRequest()) }}</button>
                        <span class="input-group-text py-0">$</span>
                    </div>
                </td>
            </tr>


        </tbody>

    </table>
    @error('tipo_otro_gasto')
        <span class="text-danger text-message-validation">
            {{ $message }}
        </span>
        <br>
    @enderror

    @error('cantidad_otro_gasto')
        <span class="text-danger text-message-validation">
            {{ $message }}
        </span>
    @enderror
</div>
