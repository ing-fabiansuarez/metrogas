@extends('layouts.user_type.auth')
@section('content')
    <div>
        <div class="card mb-1">
            <div class="card-header pb-0 px-3 pt-3">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">Verificar Quien No Ha Llenado Formulario</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <br>
                        <div class="input-group">
                            <button class="btn bg-gradient-danger btn-sm mb-0" data-bs-toggle="modal"
                                data-bs-target="#modal-new-obj">
                                Enviar Notificación Via Email</button>
                        </div>
                        <br>
                        <br>
                    </div>

                    <div class="col-md-10">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>Todo Correcto!</strong> {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    @if (session('validation'))
                        <div class="col-md-10">
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong>
                                @foreach (session('validation') as $msg)
                                    {{ $msg }} <br>
                                @endforeach
                            </div>
                        </div>
                    @endif




                </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Id
                                </th>

                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Nombre
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Cedula
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Correo
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Placa
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
                                            @if ($object->verficarSiLlenoFormulario(date('Y-m-d')))
                                                <span
                                                    class="badge badge-sm bg-gradient-success">{{ $object->nombre_completo }}</span>
                                            @else
                                                <span
                                                    class="badge badge-sm bg-gradient-danger">{{ $object->nombre_completo }}</span>
                                            @endif

                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $object->cedula }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $object->correo }}
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {{ $object->placa_vehiculo }}
                                        </span>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $objetsModel->links() }} --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div>


        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="modal-new-obj">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.preoperacional.emails', 1) }}">
                        <div class="modal-header">
                            <h5 class="modal-title"> Emails</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Correos Electrónicos</label>
                                @csrf
                                <textarea class="form-control" name="emails" rows="3">
@foreach ($emailsArray as $email)
{{ $email }},
@endforeach
</textarea>
                                @error('emails')
                                    <span class="text-danger text-message-validation">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">{{ __('forms.close') }}</button>
                            <button type="submit" class="btn bg-gradient-primary">Enviar
                                correo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        window.addEventListener('close-modal', event => {
            $('#modal-new-obj').modal('hide');
        });
    </script>
@endpush
