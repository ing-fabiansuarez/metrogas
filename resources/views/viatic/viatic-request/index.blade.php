@extends('layouts.user_type.auth')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card px-3 pt-4 pb-0 mt-3 mb-3">
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar" class="px-0">
                            <li class="active" id="account"><strong>{{ __('messages.viatic_request') }}</strong> </li>
                            <li id="personal"><strong>{{ __('messages.aprove_boss') }}</strong></li>
                            <li id="payment"><strong>{{ __('messages.sign_aprove') }}</strong></li>
                            <li id="confirm"><strong>{{ __('messages.legalization') }}</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <br>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">{{ __('messages.information_request') }}</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">{{ __('messages.step_1') }}</h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                                    <textarea class="form-control form-control-sm" rows="3"
                                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}"></textarea>
                                </div>

                                <div class="table-responsive p-0">
                                    <label
                                        for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
                                    <div class="card bg-gray-100">
                                        <div class="card-body">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.origin_site') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.destination_site') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.start_date') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.end_date') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Acción
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Destino # 1
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-select form-select-sm"
                                                                    aria-label=".form-select-sm example">
                                                                    <option selected>Open this select menu</option>
                                                                    <option value="1">One</option>
                                                                    <option value="2">Two</option>
                                                                    <option value="3">Three</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-select form-select-sm"
                                                                    aria-label=".form-select-sm example">
                                                                    <option selected>Open this select menu</option>
                                                                    <option value="1">One</option>
                                                                    <option value="2">Two</option>
                                                                    <option value="3">Three</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" type="date">
                                                            </div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" type="date">
                                                            </div>
                                                        </td>

                                                        <td class="text-center">
                                                            <a>
                                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button
                                                class="btn bg-gradient-primary btn-sm mb-0">{{ __('forms.button.agregar') }}</button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">{{ __('messages.aprove_boss') }}</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">{{ __('messages.step_2') }}</h2>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="exampleFormControlTextarea1">{{ __('forms.viatic_request.justificacion') }}</label>
                                    <textarea class="form-control form-control-sm" rows="3"
                                        placeholder="{{ __('forms.viatic_request.justificacion.placeholder') }}" disabled></textarea>
                                </div>

                                <div class="table-responsive p-0">
                                    <label
                                        for="exampleFormControlTextarea1">{{ __('messages.information_about_comision') }}</label>
                                    <div class="card bg-gray-100">
                                        <div class="card-body p-2">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.origin_site') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.destination_site') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.start_date') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('forms.viatic_request.end_date') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Destino # 1
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-select form-select-sm"
                                                                    aria-label=".form-select-sm example" disabled>
                                                                    <option selected>FLORIDABLANDA</option>
                                                                    <option value="1">One</option>
                                                                    <option value="2">Two</option>
                                                                    <option value="3">Three</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <select class="form-select form-select-sm"
                                                                    aria-label=".form-select-sm example" disabled>
                                                                    <option selected>OCAÑA</option>
                                                                    <option value="1">One</option>
                                                                    <option value="2">Two</option>
                                                                    <option value="3">Three</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" type="date"
                                                                    disabled>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" type="date"
                                                                    disabled>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive p-0">
                                    <label for="exampleFormControlTextarea1">{{ __('messages.rates') }}</label>
                                    <div class="card bg-gray-100">
                                        <div class="card-body p-2">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('messages.accommodation') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('messages.feeding') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('messages.intermunicipal_transport') }}
                                                        </th>
                                                        <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            {{ __('messages.municipal_transport') }}
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Destino # 1
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="number"
                                                                        class="form-control form-control-sm">
                                                                    <span class="input-group-text py-0">$</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="number"
                                                                        class="form-control form-control-sm">
                                                                    <span class="input-group-text py-0">$</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="number"
                                                                        class="form-control form-control-sm">
                                                                    <span class="input-group-text py-0">$</span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="number"
                                                                        class="form-control form-control-sm">
                                                                    <span class="input-group-text py-0">$</span>
                                                                </div>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Image Upload:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div>
                                <label class="fieldlabels">Upload Your Photo:</label>
                                <input type="file" name="pic" accept="image/*">
                                <label class="fieldlabels">Upload Signature Photo:</label>
                                <input type="file" name="pic" accept="image/*">
                            </div>
                            <input type="button" name="next" class="next action-button" value="Submit" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div>
                                <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link href="../assets/css/progressbar.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="../assets/js/progressbar.js"></script>
@endpush
