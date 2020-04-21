<!doctype html>
<html lang="zxx">

<head>
    @include('layouts.front._head')
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        @include('layouts.front._header')
    </header>
    <!-- Header part end-->

    @yield('content')

    <!--::footer_part start::-->
    <footer class="footer_part">
       @include('layouts.front._footer')
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    @include('layouts.front._script')
</body>

</html>