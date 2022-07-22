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
                                <h5 class="mb-0">Anticipos</h5>
                            </div>

                        </div>

                        <form action="{{ route('report.viaticrequest') }}" method="get">
                            <div class="row mt-2 justify-content-center">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input_object_guid" class="form-control-label">N° Solicitud</label>
                                        <input class="form-control form-control-sm" type="number"
                                            placeholder="N° Solicitud" name="num_solicitud"
                                            value="{{ $request->get('num_solicitud') }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input_object_guid" class="form-control-label">Solicitada por</label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                            name="solicitado_por">
                                            <option value="" selected="">-- Seleccionar --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    @if ($user->id == $request->get('solicitado_por')) selected @endif>{{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input_object_guid" class="form-control-label">Estado</label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                            name="estado">
                                            <option value="" selected>-- Seleccionar --</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->getId() }}"
                                                    @if ($state->getId() == $request->get('estado')) selected @endif>
                                                    {{ $state->getName() }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Fecha Creación:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input name="fecha_creacion" type="text"
                                                class="form-control form-control-sm float-right" id="reservation">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <input name="r" style="width: 100%" class="btn bg-gradient-primary btn-sm"
                                        type="submit" value="Buscar">
                                </div>
                                <div class="col-md-2">
                                    <input name="r" type="submit" style="color: white; width: 100%;"
                                        class="btn bg-secundary btn-sm" value="Exportar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                                <p class="text-xs font-weight-bold mb-0">{{ $viaticReq->id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $viaticReq->justification }}</p>
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
                            {{ $viaticRequests->links() }}
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
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@push('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('#reservation').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear',
                    format: 'YYYY/MM/DD'
                }
            })
            $('#reservation').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format(
                    'YYYY/MM/DD'));
            });

            $('#reservation').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        })
    </script>
@endpush
