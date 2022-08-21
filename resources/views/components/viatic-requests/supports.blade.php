<div class="row">
    <div class="col-md-12">
        <div class="table-responsive p-0">
            <label for="exampleFormControlTextarea1">SOPORTES</label>
            <div class="card bg-gray-100">
                <div class="card-body p-2">

                    <table class="table table-hover table-bordered align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Creado Por
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Observacion
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($viaticRequest->supports as $support)
                                <tr>
                                    <td>
                                        <span class="text-secondary text-xs">
                                            {{ $support->id }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs">
                                            {{ $support->createdBy->name }}
                                            <br>
                                            <b> {{ $support->createdBy->jobtitle->name }}</b>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs">
                                            {{ $support->observation }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <a target="_blank" href="{{ Storage::url($support->url) }}">
                                            <i class="cursor-pointer fas fa-eye text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
