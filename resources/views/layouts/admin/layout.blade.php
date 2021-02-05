<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="layouts/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="layouts/assets/vendor/nucleo/css/nucleo.css?v=1.3" type="text/css">
    <link rel="stylesheet" href="layouts/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css?v=1.3" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="layouts/assets/css/argon.css?v=1.3" type="text/css">
</head>

<body>
<!-- Sidenav -->
@include('layouts.admin.sidebar')
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Navbar -->
    @include('layouts.admin.navbar')
    <!-- Header -->
    <!-- Header -->
    @include('layouts.admin.header')
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @yield('content')
        <!-- Footer -->
        @include('layouts.admin.footer')
    </div>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="layouts/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="layouts/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="layouts/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="layouts/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="layouts/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="layouts/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="layouts/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="layouts/assets/js/argon.js?v=1.2.0"></script>
</body>
</html>