@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="page-header min-height-100 border-radius-xl">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-12">
                        <form action="{{ route('user.searchuser') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input name="username" type="text" class="form-control" placeholder="Username"
                                    aria-describedby="button-addon2"
                                    value="{{ old('username', isset($userLdap) ? $userLdap->getAccountName() : '') }}">
                                <button class="btn bg-gradient-secondary mb-0" type="submit"
                                    id="button-addon2">{{ __('forms.button.search') }}</button>
                            </div>
                            @error('username')
                                <span class="text-danger text-message-validation">
                                    {{ $message }}
                                </span>
                            @enderror
                        </form>
                        {{-- Aqui se muestra los mensajes de alerta --}}
                        @if (session('msg'))
                            <div class="{{ session('msg')['class'] }} mt-2 mb-0 py-2" style="font-size: 0.8rem"
                                role="alert">
                                {{ session('msg')['body'] }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if (isset($userLdap))
            <div class="container-fluid py-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{ __('forms.user.information_general') }}</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <form action="{{ url('/usuarios') }}" method="POST" role="form text-left">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_object_guid"
                                            class="form-control-label">{{ __('forms.user.object_guid') }}</label>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="{{ __('forms.user.object_guid') }}" id="input_object_guid"
                                            name="object_guid" value="{{ $userLdap->getAuthIdentifier() }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_name"
                                            class="form-control-label">{{ __('forms.user.name') }}</label>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="{{ __('forms.user.name') }}" id="input_name" name="nombre"
                                            value="{{ $userLdap->getCommonName() }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_username"
                                            class="form-control-label">{{ __('forms.user.username') }}</label>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="{{ __('forms.user.username') }}" id="input_username"
                                            name="username" value="{{ $userLdap->getAccountName() }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_user_principal_name"
                                            class="form-control-label">{{ __('forms.user.user_principal_name') }}</label>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="{{ __('forms.user.user_principal_name') }}"
                                            id="input_user_principal_name" name="nombre_principal"
                                            value="{{ $userLdap->getUserPrincipalName() }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_email"
                                            class="form-control-label">{{ __('forms.user.email') }}</label>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="{{ __('forms.user.email') }}" id="input_email" name="email"
                                            value="{{ $userLdap->getEmail() }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input_jobtitle_ldap"
                                            class="form-control-label">{{ __('forms.user.jobtitle_ldap') }}</label>
                                        <input class="form-control form-control-sm" type="text"
                                            placeholder="{{ __('forms.user.jobtitle_ldap') }}" id="input_jobtitle_ldap"
                                            name="jobtitle_ldap" value="{{ $userLdap->getDescription() }}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_email"
                                            class="form-control-label">{{ __('forms.user.jobtitle') }}</label>
                                        <select class="form-select form-select-sm" id="input_email">
                                            <option value="" selected>{{ __('forms.select.selected') }}</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="input_perfil"
                                            class="form-control-label">{{ __('forms.user.perfil') }}</label>
                                        <select class="form-select form-select-sm" id="input_perfil">
                                            <option value="" selected>{{ __('forms.select.selected') }}</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="input_state"
                                            class="form-control-label">{{ __('forms.user.state') }}</label>
                                        <select class="form-select form-select-sm" id="input_state">
                                            <option value="" selected>{{ __('forms.select.selected') }}</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit"
                                    class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('forms.user.button.new') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
