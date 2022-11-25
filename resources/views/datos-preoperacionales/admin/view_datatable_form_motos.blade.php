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
                                <h5 class="mb-0">Formulario Motos </h5>
                            </div>

                        </div>

                        <form action="{{ route('admin.preoperacional') }}" method="get">
                            @csrf
                            <div class="row mt-2 justify-content-center">
                                {{--  <div class="col-md-2">
                                    <div class="form-group text-center">
                                        <label style="width: 100%" for="input_object_guid"
                                            class="form-control-label text-center">Digite Placa</label>
                                        <input class="form-control form-control-sm" type="text" placeholder="Placa"
                                            name="placa_vehiculo" value="{{ $inputs['placa_vehiculo'] }}">
                                    </div>
                                </div>
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Fecha de Creación</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <input name="fecha_creacion" type="text"
                                                class="form-control form-control-sm float-right" id="reservationtime"
                                                value="{{ $inputs['fecha_creacion'] }}">
                                        </div>

                                    </div>
                                </div> --}}


                            </div>

                            <div class="row justify-content-center">
                               {{--  <div class="col-md-2">
                                    <input name="r" style="width: 100%" class="btn bg-gradient-primary btn-sm"
                                        type="submit" value="Buscar">
                                </div> --}}
                                <div class="col-md-2">
                                    <button type="button" style="color: white; width: 100%;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" class="btn bg-secundary btn-sm">Exportar</button>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('admin.preoperacional.verificar', $tipo_form) }}" style="width: 100%"
                                        class="btn bg-gradient-primary btn-sm">Verficar</a>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" style="color: white; width: 100%;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal1" class="btn bg-secundary btn-sm">Descargar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="p-3" style="font-size: 0.8rem !important">
                            <livewire:form-datos-preoperacionales.form-motos-data-table theme="bootstrap-5" />

                            {{--  <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fecha y hora
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
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($respuestasForm as $item)
                                        <tr>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.ver', $item->id) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->id }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.ver', $item->id) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->created_at }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.ver', $item->id) }}">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $item->cedula }}</p>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.preoperacional.ver', $item->id) }}">
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
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    <a href="{{ route('admin.preoperacional.moto.imprimir.descargar',$item) }}"
                                                        class="mx-2">
                                                        <i class="fas fa-download text-secondary"></i>
                                                    </a>
                                                </p>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $respuestasForm->links() }}
                            </div>
                            @if (count($respuestasForm) < 1)
                                <p class="m-3">
                                    No hay datos
                                </p>
                            @endif --}}
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
                    <form action="{{ route('admin.preoperacional.exportar') }}" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="input_object_guid" class="form-control-label">ID Formulario</label>
                                    <input class="form-control form-control-sm" type="number" placeholder="N° Solicitud"
                                        name="num_solicitud">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Desde</label>
                                    <input class="form-control form-control-sm" type="date" name="fecha_inicial">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Hasta</label>
                                    <input class="form-control form-control-sm" type="date" name="fecha_final">
                                </div>
                                <div class="form-group">
                                    <label for="input_object_guid" class="form-control-label">Placa</label>
                                    <input class="form-control form-control-sm" type="text" name="placa_vehiculo">
                                </div>
                                <div class="form-group">
                                    <label for="input_object_guid" class="form-control-label">Cedula</label>
                                    <input class="form-control form-control-sm" type="text" name="cedula">
                                </div>
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

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Descargar Imagenes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('datospreoperacionales.descargar') }}" method="get">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-control-label">Fecha</label>
                                    <input class="form-control form-control-sm" type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary"
                                data-bs-dismiss="modal">Cerrar</button>
                            @csrf
                            <input type="hidden" name="type" value="{{ $tipo_form }}">
                            <button type="submit" style="color: white" class="btn bg-secundary">Exportar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $(function() {
            $('#reservationtime').daterangepicker({
                timePicker: true,
                autoUpdateInput: false,
                locale: {
                    format: 'DD-MM-YYYY HH:mm',
                    cancelLabel: 'Cancelar'
                }
            })

            $('#reservationtime').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD-MM-YYYY HH:mm') + ' - ' + picker.endDate.format(
                    'DD-MM-YYYY HH:mm'));
            });

            $('#reservationtime').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        })
    </script>
@endpush