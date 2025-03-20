<!doctype html>
<html lang="en" data-theme="dark">

<head>
    <title>@yield('pageTitle')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description"
        content="Mooli Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
    <meta name="author" content="GetBootstrap, design by: puffintheme.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/back/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/animate-css/vivify.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="/back/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet"
        href="/back/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
    <link rel="stylesheet" href="/back/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" href="/back/assets/vendor/multi-select/css/multi-select.css">
    <link rel="stylesheet" href="/back/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/back/assets/vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="/back/assets/vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/back/assets/vendor/c3/c3.min.css">

    <link rel="stylesheet" href="/back/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css">
    <link rel="stylesheet" href="/back/assets/vendor/dropify/css/dropify.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/back/assets/css/mooli.min.css">

</head>

<body>

    <div id="body" class="theme-cyan">
        <!-- Page Loader -->
        {{-- <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="assets/images/icon.svg" width="40" height="40" alt="Mooli">
                </div>
                <p>Please wait...</p>
            </div>
        </div> --}}

        <!-- Theme Setting -->
        <div class="themesetting">
            <a href="javascript:void(0);" class="theme_btn"><i class="fa fa-gear fa-spin"></i></a>
            <ul class="list-group">
                <li class="list-group-item">
                    <ul class="choose-skin list-unstyled mb-0">
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                        </li>
                        <li data-theme="cyan" class="active">
                            <div class="cyan"></div>
                        </li>
                        <li data-theme="timber">
                            <div class="timber"></div>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="amethyst">
                            <div class="amethyst"></div>
                        </li>
                    </ul>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Light Sidebar</span>
                    <label class="switch sidebar_light">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Gradient</span>
                    <label class="switch gradient_mode">
                        <input type="checkbox" checked="">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Dark Mode</span>
                    <label class="switch dark_mode">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>RTL version</span>
                    <label class="switch rtl_mode">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        <div id="wrapper">

            <!-- Page top navbar -->
            @include('back.layout.navbar')
            <!-- Main left sidebar menu -->
            @include('back.layout.sidebar')
            <!-- Main body part  -->
            @yield('content')

        </div>
    </div>


    <!-- Core libraries -->
    <script src="/back/assets/bundles/libscripts.bundle.js"></script>
    <script src="/back/assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Vendor plugins -->
    <script src="/back/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="/back/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script src="/back/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script src="/back/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="/back/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="/back/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/back/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="/back/assets/vendor/nouislider/nouislider.js"></script>

    <!-- DataTables -->
    <script src="/back/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="/back/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="/back/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="/back/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="/back/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="/back/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

    <!-- Chart and Visualization plugins -->
    <script src="/back/assets/bundles/flotscripts.bundle.js"></script>
    <script src="/back/assets/bundles/c3.bundle.js"></script>
    <script src="/back/assets/bundles/apexcharts.bundle.js"></script>
    <script src="/back/assets/bundles/jvectormap.bundle.js"></script>

    <!-- Other Plugins -->
    <script src="/back/assets/vendor/sweetalert/sweetalert.min.js"></script>

    <script src="/back/assets/vendor/dropify/js/dropify.js"></script>

    <!-- Project-specific scripts -->
    <script src="/back/assets/bundles/mainscripts.bundle.js"></script>
    <script src="/back/js/pages/tables/jquery-datatable.js"></script>
    <script src="/back/js/pages/forms/advanced-form-elements.js"></script>
    <script src="/back/js/pages/forms/dropify.js"></script>
    <script src="/back/js/index.js"></script>
</body>

</html>
