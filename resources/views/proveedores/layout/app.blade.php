<!DOCTYPE html>
<html lang="es" id="imprimible">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Registro Proveedores
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css"
        media="all" />
    <link id="pagestyle" href="{{ asset('/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" type="text/css"
        media="all" />
    <link href="{{ asset('assets/css/ui-fabian-form-proveedor.css') }}" rel="stylesheet" type="text/css"
        media="all" />
    @livewireStyles
</head>


<body class="bg-gray-200">



    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 w-100 shadow-none  navbar-transparent mt-4">
        <div class="container-fluid container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white">
                Registro
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

    @yield('content')

    {{-- <footer class="footer pb-3">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        <a style="color: #252f40;" href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                            target="_blank">Metrogas de Colombia S.A E.S.P
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </footer> --}}

    @livewireScripts
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
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

    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    @stack('js')
</body>

</html>
