@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                @if (session('msg'))
                    <div class="alert {{ session('msg.class') }}" role="alert">
                        <strong>{{ session('msg.body') }}</strong>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Solicitudes Anticipos Viaticos</h5>
                            </div>
                            <a href="{{ route('viatic.create') }}" class="btn bg-gradient-primary btn-sm mb-0"
                                type="button">+&nbsp; Crear Solicitud</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">


                        <div class="table-responsive p-0">
                            <table style="width: 100%" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 6%" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            N° Solicitud
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Justificación
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fecha creación
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Estado
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Acci&oacute;n
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viaticRequests as $viaticReq)
                                        <tr>
                                            <td class="ps-4">
                                                <a href="{{ route('viatic.show', $viaticReq) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $viaticReq->id }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('viatic.show', $viaticReq) }}">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ Str::limit($viaticReq->justification, 50) }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $viaticReq->created_at }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge {{ $viaticReq->stateColor() }}">{{ $viaticReq->getNameState() }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('viatic.show', $viaticReq) }}" class="mx-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Abrir Solicitud">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (count($viaticRequests) < 1)
                                <p class="m-3">
                                    No hay datos
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
