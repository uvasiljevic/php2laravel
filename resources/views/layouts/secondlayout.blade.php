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
        @include('components.secondslider')
    </div>

    <!-- Checkout -->

    @yield('content')

    <!-- Footer -->

    <div class="footer_overlay"></div>
    <footer class="footer">
        @include('components.footer')
    </footer>
    </div>

@include('components.scripts')
@yield('scripts')
</html>
