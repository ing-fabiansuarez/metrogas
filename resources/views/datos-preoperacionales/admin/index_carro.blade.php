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
                                <h5 class="mb-0">Formulario Carros</h5>
                            </div>

                        </div>

                        <form action="{{ route('admin.preoperacional.carros') }}" method="get">
                            @csrf
                            <div class="row mt-2 justify-content-center">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input_object_guid" class="form-control-label">Id Formulario</label>
                                        <input class="form-control form-control-sm" type="number"
                                            placeholder="N° Solicitud" name="num_solicitud">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <input name="r" style="width: 100%" class="btn bg-gradient-primary btn-sm"
                                        type="submit" value="Buscar">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" style="color: white; width: 100%;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" class="btn bg-secundary btn-sm">Exportar</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('admin.preoperacional.verificar', $tipo_form) }}" style="width: 100%"
                                        class="btn bg-gradient-primary btn-sm">Verficar</a>
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
                                            Id Formulario
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Cedula
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre Completo
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Correo
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lugar de Trabajo
                                        </th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Area
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Placa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($respuestasForm as $item)
                                        <tr>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.carros.ver', $item->id) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->id }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.carros.ver', $item->id) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->cedula }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.carros.ver', $item->id) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->nombre_completo }}
                                                    </p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->correo }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->lugar_trabajo }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->area }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $item->placa_vehiculo }}
                                                </p>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (count($respuestasForm) < 1)
                                <p class="m-3">
                                    No hay datos
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Exportar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exportar Información</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.preoperacional.carros.exportar') }}" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                {{--  <div class="form-group">
                                    <label for="input_object_guid" class="form-control-label">ID Formulario</label>
                                    <input class="form-control form-control-sm" type="number" placeholder="N° Solicitud"
                                        name="num_solicitud">
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label class="form-control-label">Desde</label>
                                    <input class="form-control form-control-sm" type="date" name="fecha_inicial">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Hasta</label>
                                    <input class="form-control form-control-sm" type="date" name="fecha_final">
                                </div>
                                <div class="form-group">
                                    <label for="input_object_guid" class="form-control-label">Solicitada por</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="empleado">
                                        <option value="" selected="">-- Seleccionar --</option>
                                         @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}
                                            </option>
                                        @endforeach 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="input_object_guid" class="form-control-label">Estado</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                        name="estado_filtro">
                                        <option value="" selected>-- Seleccionar --</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->getId() }}">
                                                {{ $state->getName() }}
                                            </option>
                                        @endforeach 
                                    </select>
                                </div> --}}
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
                            @csrf
                            <button type="submit" name="r" value="normal" style="color: white"
                                class="btn bg-secundary">Exportar</button>
                        </div>
                    </form>
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
