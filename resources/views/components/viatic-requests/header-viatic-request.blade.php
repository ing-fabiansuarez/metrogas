<div>
    <div class="row mb-3">
        <div class="col-12 text-center">
            <div>
                <span style="font-size: 1rem;color:black;"> <b>Solicitud N°
                        {{ $viaticRequest->id }}</b></span>
            </div>
            <br>
            <span style="font-size: 1rem">{{ $viaticRequest->user->name }}</span><br>
            <span style="font-size: 0.8rem">{{ $viaticRequest->user->jobtitle->name }}</span><br>
            <span style="font-size: 0.8rem">NIVEL {{ $viaticRequest->user->jobtitle->level }}</span>
        </div>
    </div>
</div>
