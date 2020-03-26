<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.head')
    @yield('links')
</head>
<body>

<div class="super_container">

    <!-- Header -->

    @include('components.header')

    <!-- Home -->

    <div class="home">
        @include('components.homeslider')
    </div>

    <!-- Ads -->

        @include('components.ads')

    <!-- Products -->

    <div class="products">
        @yield('products')
    </div>

    <!-- Ad -->

    @include('components.ad')

    <!-- Icon Boxes -->

    @include('components.icons')


    <!-- Footer -->

    <div class="footer_overlay"></div>
    <footer class="footer">
        @include('components.footer')
    </footer>
</div>
@include('components.scripts')
</body>
</html>
