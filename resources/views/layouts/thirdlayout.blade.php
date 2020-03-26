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
        @include('components.thirtdslider')
    </div>

    <!-- Checkout -->

@yield('content')
</div>
</body>
<!-- Footer -->

    <div class="footer_overlay"></div>
    <footer class="footer">
        @include('components.footer')
    </footer>
</div>

@include('components.scripts')
@yield('scripts')
</html>
