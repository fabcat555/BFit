<!DOCTYPE html>
<html lang="en">
@include('shared.head')

<body>
    <section id="container">
        <!-- TOPBAR -->
        @yield('topbar')

        <!-- SIDEBAR -->
        @yield('sidebar')

        <!-- MAIN CONTENT -->
        @yield('content')

        <!-- FOOTER -->
        @include('shared.footer')
    </section>

    @include('shared.scripts')
</body>
</html>