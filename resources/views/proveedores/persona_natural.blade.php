<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
        content="creative tim, updivision, html dashboard, laravel, html css dashboard laravel, soft ui dashboard laravel, laravel soft ui dashboard, soft ui admin, laravel dashboard, laravel admin, web dashboard, bootstrap 5 dashboard laravel, bootstrap 5, css3 dashboard, bootstrap 5 admin laravel, soft ui dashboard bootstrap 5 laravel, frontend, responsive bootstrap 5 dashboard, soft ui dashboard, soft ui laravel bootstrap 5 dashboard" />
    <meta name="description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta itemprop="name" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta itemprop="description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta itemprop="image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg" />
    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="@creativetim" />
    <meta name="twitter:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta name="twitter:description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta name="twitter:creator" content="@creativetim" />
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg" />
    <meta property="fb:app_id" content="655968634437471" />
    <meta property="og:title" content="Soft UI Dashboard Laravel by Creative Tim & UPDIVISION" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://www.creative-tim.com/live/soft-ui-dashboard-laravel" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/602/original/soft-ui-dashboard-laravel.jpg" />
    <meta property="og:description"
        content="A free Laravel Dashboard featuring dozens of UI components & basic Laravel CRUDs." />
    <meta property="og:site_name" content="Creative Tim" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Registro Proveedores
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <link href="{{ asset('assets/css/ui-fabian.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/ui-fabian-form-proveedor.css') }}" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 w-100 shadow-none  navbar-transparent mt-4">
        <div class="container-fluid container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
                Registro de proveedores
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto"></ul>
                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">
                        <a href="https://metrogasesp.com/" target="_blank"
                            class="btn btn-sm btn-round mb-0 me-1 bg-gradient-light">Pagina Web</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="min-vh-100">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-10 m-3 border-radius-lg bg-background-secundary"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <br>
                        <p style="font-size: 1.3rem" class="text-lead text-white"><b>Formulario de Registro Persona
                                Natural</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                <div class="col-xl-12 col-lg-12 col-md-12 mx-auto">
                    <form action="/user-profile" method="POST" role="form text-left">
                        <div class="card z-index-0 mt-3">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Información del Solicitante</h6>
                            </div>
                            <div class="card-body pt-3 p-3">


                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label">Nombres</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Nombres">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="form-control-label">Apellidos</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Apellidos">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="form-control-label">Sexo / Género</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Tipo Identificación</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Número Identificación</label>
                                            <input class="form-control form-control-sm" type="number"
                                                placeholder="Número">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Lugar Expedición</label>
                                            <input class="form-control form-control-sm" type="text"
                                                placeholder="Lugar Expedición" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Fecha Expedición</label>
                                            <input class="form-control form-control-sm" type="date" />
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Estado Civil</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Nivel Educativo</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">¿Personas a cargo?</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Número de Personas</label>
                                            <input class="form-control form-control-sm" type="number" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Tipo Vivienda</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Zona de Ubicación</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Fecha de Nacimiento</label>
                                            <input class="form-control form-control-sm" type="date" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad / Departamento</label>
                                            <input class="form-control form-control-sm" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Dirección de domicilio</label>
                                            <input class="form-control form-control-sm" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Ciudad de domicilio</label>
                                            <input class="form-control form-control-sm" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Departamento de domicilio</label>
                                            <input class="form-control form-control-sm" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Correo electronico</label>
                                            <input class="form-control form-control-sm" type="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Celular</label>
                                            <input class="form-control form-control-sm" type="number" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-control-label">Teléfono</label>
                                            <input class="form-control form-control-sm" type="number" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Ocupación</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Código actividad CIIU Principal</label>
                                            <select class="form-select form-select-sm">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-control-label">Detalle Actividad Económica</label>
                                            <input class="form-control form-control-sm" type="text" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Información Tributaria</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="flexSwitchCheckDefault1">
                                                    <label
                                                        class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">Gran contribuyente</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="flexSwitchCheckDefault1">
                                                    <label
                                                        class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">Autorretenedor</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="flexSwitchCheckDefault1">
                                                    <label
                                                        class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">Responsable de IVA</label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0 px-0">
                                                <div class="form-check form-switch ps-0">
                                                    <input class="form-check-input ms-auto" type="checkbox"
                                                        id="flexSwitchCheckDefault1">
                                                    <label
                                                        class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                                        for="flexSwitchCheckDefault1">¿Maneja dinero del estado o está
                                                        expuesto públicamente?</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">Datos Laborales</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre de la empresa</label>
                                                    <input class="form-control form-control-sm" type="number"
                                                        placeholder="Número">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Tipo Empresa o Negocio</label>
                                                    <select class="form-select form-select-sm">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Cargo</label>
                                                    <input class="form-control form-control-sm" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Dirección de la empresa</label>
                                                    <input class="form-control form-control-sm" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Ciudad</label>
                                                    <input class="form-control form-control-sm" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Barrio</label>
                                                    <input class="form-control form-control-sm" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Teléfono</label>
                                                    <input class="form-control form-control-sm" type="number" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="card h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Datos Persona de Contacto</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Nombre de contacto</label>
                                                    <input class="form-control form-control-sm" type="number"
                                                        placeholder="Número">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Cargo</label>
                                                    <input class="form-control form-control-sm" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Teléfono</label>
                                                    <input class="form-control form-control-sm" type="number" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label">Email</label>
                                                    <input class="form-control form-control-sm" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-1">Projects</h6>
                                        <p class="text-sm">Architects design houses</p>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                                <div class="card card-blog card-plain">
                                                    <div class="position-relative">
                                                        <a class="d-block shadow-xl border-radius-xl">
                                                            <img src="../assets/img/home-decor-1.jpg"
                                                                alt="img-blur-shadow"
                                                                class="img-fluid shadow border-radius-xl">
                                                        </a>
                                                    </div>
                                                    <div class="card-body px-1 pb-0">
                                                        <p class="text-gradient text-dark mb-2 text-sm">Project #2
                                                        </p>
                                                        <a href="javascript:;">
                                                            <h5>
                                                                Modern
                                                            </h5>
                                                        </a>
                                                        <p class="mb-4 text-sm">
                                                            As Uber works through a huge amount of internal
                                                            management turmoil.
                                                        </p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm mb-0">View
                                                                Project</button>
                                                            <div class="avatar-group mt-2">
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Elena Morison">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-1.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Ryan Milly">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-2.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Nick Daniel">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-3.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Peterson">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-4.jpg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                                <div class="card card-blog card-plain">
                                                    <div class="position-relative">
                                                        <a class="d-block shadow-xl border-radius-xl">
                                                            <img src="../assets/img/home-decor-2.jpg"
                                                                alt="img-blur-shadow"
                                                                class="img-fluid shadow border-radius-lg">
                                                        </a>
                                                    </div>
                                                    <div class="card-body px-1 pb-0">
                                                        <p class="text-gradient text-dark mb-2 text-sm">Project #1
                                                        </p>
                                                        <a href="javascript:;">
                                                            <h5>
                                                                Scandinavian
                                                            </h5>
                                                        </a>
                                                        <p class="mb-4 text-sm">
                                                            Music is something that every person has his or her own
                                                            specific opinion about.
                                                        </p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm mb-0">View
                                                                Project</button>
                                                            <div class="avatar-group mt-2">
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Nick Daniel">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-3.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Peterson">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-4.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Elena Morison">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-1.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Ryan Milly">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-2.jpg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                                <div class="card card-blog card-plain">
                                                    <div class="position-relative">
                                                        <a class="d-block shadow-xl border-radius-xl">
                                                            <img src="../assets/img/home-decor-3.jpg"
                                                                alt="img-blur-shadow"
                                                                class="img-fluid shadow border-radius-xl">
                                                        </a>
                                                    </div>
                                                    <div class="card-body px-1 pb-0">
                                                        <p class="text-gradient text-dark mb-2 text-sm">Project #3
                                                        </p>
                                                        <a href="javascript:;">
                                                            <h5>
                                                                Minimalist
                                                            </h5>
                                                        </a>
                                                        <p class="mb-4 text-sm">
                                                            Different people have different taste, and various types
                                                            of music.
                                                        </p>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <button type="button"
                                                                class="btn btn-outline-primary btn-sm mb-0">View
                                                                Project</button>
                                                            <div class="avatar-group mt-2">
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Peterson">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-4.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Nick Daniel">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-3.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Ryan Milly">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-2.jpg">
                                                                </a>
                                                                <a href="javascript:;"
                                                                    class="avatar avatar-xs rounded-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Elena Morison">
                                                                    <img alt="Image placeholder"
                                                                        src="../assets/img/team-1.jpg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                                <div class="card h-100 card-plain border">
                                                    <div
                                                        class="card-body d-flex flex-column justify-content-center text-center">
                                                        <a href="javascript:;">
                                                            <i class="fa fa-plus text-secondary mb-3"
                                                                aria-hidden="true"></i>
                                                            <h5 class=" text-secondary"> New project </h5>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
    </section>

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
