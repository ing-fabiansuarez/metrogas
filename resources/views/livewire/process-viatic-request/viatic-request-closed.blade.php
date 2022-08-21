<div class="card px-3 pt-4 pb-0 mt-0 mb-3">
    <div id="msform">
        <!-- progressbar -->
        <x-viatic-requests.progress-bar :stepsCompletes='7' />
        <br>

        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">Finalizada
                        <h2 class="fs-title"></h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Paso 7</h2>
                    </div>
                </div>
                <br><br>
                <h2 class="purple-text text-center"><strong>COMPLETA !</strong></h2>
                <br>

            </div>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Solicitud de anticipo</h2>
                    </div>

                </div>

                <x-viatic-requests.header-viatic-request :viaticRequest="$viaticRequest" />

                <x-viatic-requests.justification :viaticRequest="$viaticRequest" />

                <x-viatic-requests.comission :viaticRequest="$viaticRequest" />

                <x-viatic-requests.tarifas :viaticRequest="$viaticRequest" />

                <x-viatic-requests.supports :viaticRequest="$viaticRequest" />

                {{-- descargar anticipo --}}
                <div class="row">
                    <div class="col-md-6">
                        {{-- <a target="_blank" href="{{ Storage::url($viaticRequest->url_aceptation) }}"
                            style="color: white" type="button" class="btn bg-secundary btn-sm">Ver
                            Anticipo</a> --}}
                        <a target="_blank" href="{{ route('viatic.pdf', $viaticRequest->id) }}" style="color: white"
                            type="button" class="btn bg-secundary btn-sm">Ver
                            Anticipo</a>
                    </div>
                </div>
               
                {{-- gestion y observaciones --}}
                <div class="row mt-3">
                    <div class="col-md-3">
                        {{-- Gestion --}}
                        <label class="mb-2">Gestión</label>
                        <ul class="list-group">
                            @foreach ($viaticRequest->otherItems as $item)
                                <li style="color: black;font-size: 0.8rem" class="list-group-item">
                                    {{ $item->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        {{-- Observacion --}}
                        <label class="mb-2">Observaciones</label>
                        @foreach ($viaticRequest->observations as $obs)
                            <div class="card bg-gray-200">
                                <div class="card-body p-3">
                                    <p style="font-size: 0.8rem" class="card-description mb-1">
                                        {{ $obs->message }}
                                    </p>
                                    <div class="author align-items-center">
                                        <div class="avatar shadow mx-2">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                                y="0px" viewBox="0 0 488.4 488.4"
                                                style="enable-background:new 0 0 488.4 488.4;" xml:space="preserve">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M416.2,73.398h-65.5c-39.9,0-72.2,32.3-72.2,72.2c0,31.9,20.7,58.9,49.4,68.5v34.4c0,3.2,3.9,4.8,6.1,2.5l33.2-33.2h49
                                                    c39.9,0,72.2-32.3,72.2-72.2C488.4,105.798,456,73.398,416.2,73.398z M362.7,154.598h-17.9v-17.9h17.9V154.598z M392.4,154.598
                                                    h-17.9v-17.9h17.9V154.598z M422,154.598h-17.9v-17.9H422V154.598z" />
                                                        <path
                                                            d="M329.1,347.598c-43.5-35.8-90.5-59.6-100.1-64.2c-1.1-0.5-1.7-1.6-1.7-2.8v-33.2c5.1-8.8,8.4-18.1,9.7-26.6
                                                    c3.7-0.3,8.6-5.5,13.9-24.1c6.8-23.9,0.5-28.7-5.7-28.7c0.6-2,1.1-4.1,1.4-6.1c11-65.9-21.5-68.2-21.5-68.2s-5.4-10.3-19.5-18.2
                                                    c-9.5-5.6-22.7-10-40.1-8.5c-5.6,0.3-11,1.4-16,3l0,0c-6.4,2.2-12.3,5.3-17.6,9c-6.5,4.1-12.7,9.2-18.1,15
                                                    c-8.6,8.8-16.2,20.1-19.6,34.3c-2.8,10.6-2.2,21.6,0.2,33.5l0,0c0.4,2,0.9,4.1,1.4,6.1c-6.1,0.1-12.1,5.1-5.4,28.6
                                                    c5.3,18.6,10.2,23.8,13.9,24.1c1.3,8.4,4.6,17.7,9.7,26.6v33.2c0,1.2-0.7,2.3-1.7,2.8c-9.5,4.7-56.5,28.4-100.1,64.2
                                                    c-7.8,6.4-12.2,16.1-12.2,26.2v48.1h341.5v-48.1C341.3,363.698,336.9,354.098,329.1,347.598z" />
                                                    </g>
                                                </g>
                                            </svg>

                                        </div>
                                        <div class="name ps-1">
                                            <span style="font-size: 0.7rem">{{ $obs->createBy->name }}</span>
                                            <div style="font-size: 0.7rem" class="stats">
                                                <small>{{ $obs->createBy->jobtitle->name }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>


            {{-- <button wire:click="$emit('beforeClose')" type="submit" name="next"
                class="btn bg-secundary btn-sm action-button">Finalizar Anticipo</button> --}}
            {{-- <a href="{{ route('viatic.pdf', $viaticRequest->id) }}"
                class="btn bg-primary btn-sm action-button">Rechazar</a> --}}
            {{-- <input type="button" name="previous" class="btn previous action-button-previous" value="Rechazar" /> --}}
        </fieldset>
    </div>
</div>
