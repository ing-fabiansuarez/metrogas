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
                        <div class="input-group">
                            <input name="username" type="text" class="form-control" placeholder="Username"
                                aria-describedby="button-addon2" value="{{ $user->name }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <div class="d-flex flex-row ">
                        <h6 style="padding-right: 50px" class="mb-0">Roles Usuario</h6>
                        <a class="btn bg-gradient-primary btn-sm mb-0" href="{{ route('roles.index') }}">Configurar
                            Roles</a>
                    </div>

                </div>

                <div class="card-body pt-4 p-3">
                    @if (session('msg'))
                        <div class="alert {{ session('msg.class') }}" role="alert">
                            {{ session('msg.body') }}
                        </div>
                    @endif
                    <form action="{{ route('user.storeRoles', $user->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($roles as $rol)

                                    <div class="form-check">
                                        <input name="roles[]" value="{{ $rol->id }}" type="checkbox"
                                            @foreach ($user->roles as $item) @if ($item->id == $rol->id) checked @endif
                                            @endforeach>
                                        <label class="form-check-label">
                                            {{ $rol->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <br><br>
                        <div class="d-flex flex-row ">
                            <h6 style="padding-right: 50px" class="mb-0">Permisos</h6>
                        </div>
                        <div class="form-check">
                            <input name="permiso" value="reintegro" type="checkbox"
                                @if ($user->can('legalization.reintegro')) checked @endif>
                            <label class="form-check-label">
                                Habilitar Reintegro
                            </label>
                        </div>


                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">Guardar Cambios</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
