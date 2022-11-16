<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <section class="min-vh-100">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
                style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <br>
                            <p style="font-size: 1.3rem" class="text-lead text-white"><b>F-HSEQ-07 V_7 LISTA DE CHEQUEO
                                    PREOPERACIONAL DE MOTOCICLETAS Y/O DESPLAZAMIENTO </b></p>
                            @if ($solo_lectura)
                                <p>
                                    <b style="color: white">ID Formulario:</b>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                        <form action="{{ route('sendprueba') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card z-index-0 mt-3">
                                        <div class="card-header pb-0 px-3">
                                            <h6 class="mb-0">Otros</h6>
                                        </div>
                                        <div class="card-body pt-3 p-3">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Fotografía del tacómetro (con
                                                            fecha y hora)
                                                        </label>

                                                        <br>

                                                        <input accept="image/*" type="file" name="myarchivo" />

                                                        @error('photo')
                                                            <span class="text-danger text-message-validation">
                                                                {{ $message }}
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center">
                                <div class="col-6">
                                    <button type="submit"
                                        class="btn btn-sm btn-round mb-0 me-1 bg-background-secundary">Guardar y
                                        enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>

</body>

</html>
