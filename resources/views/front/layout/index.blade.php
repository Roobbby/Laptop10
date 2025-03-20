<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('pageTitle')</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Vendor css -->
    <link rel="stylesheet" href="front/assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="front/assets/vendors/owl.carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="front/assets/vendors/owl.carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="front/assets/vendors/jquery-flipster/css/jquery.flipster.css">

    <link rel="stylesheet" href="back/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="back/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="back/assets/vendor/animate-css/vivify.min.css">

    <!-- sass landing page css -->
    <link rel="stylesheet" href="front/assets/css/style.min.css">
    <!-- <link rel="stylesheet" href="back/assets/css/mooli.min.css"> -->
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="mobile-menu-overlay"></div>

    <!-- top header menu -->
    @include('front.layout.navbar')

    <!-- main sass landing page html -->
    @yield('content')

    <!-- main footer section -->
    @include('front.layout.footer')

    <!-- animation line -->
    <div class="animate_lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <!-- vendors js file -->
    <script src="front/assets/vendors/base/vendor.bundle.base.js"></script>
    <script src="front/assets/vendors/owl.carousel/js/owl.carousel.js"></script>
    <script src="front/assets/vendors/jquery-flipster/js/jquery.flipster.min.js"></script>
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Vedor js file and create bundle with grunt  -->
    <script src="assets/vendor/dropify/js/dropify.js"></script>
    <script src="assets/vendor/jquery-steps/jquery.steps.js"></script>


    <!-- Project core js file minify with grunt -->
    <script src="assets/bundles/mainscripts.bundle.js"></script>
    <script src="back/assets/js/pages/forms/dropify.js"></script>
    <script src="back/assets/js/pages/forms/form-wizard.js"></script>
    <!-- page js -->
    <script src="front/assets/js/template.js"></script>
</body>

</html>
