<!DOCTYPE html>
<html lang="en">

<head>

    @include('components.adminhead')

</head>

<body class="animsition">

<div class="page-wrapper">


    <!-- MENU SIDEBAR-->
    @include('components.adminsidebar')
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">

        <!-- HEADER DESKTOP-->
        @include('components.adminheader')
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
            @yield('content')
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>

@include('components.adminscripts')

</body>

</html>
<!-- end document-->
