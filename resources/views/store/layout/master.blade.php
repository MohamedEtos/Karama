<!doctype html>
<html lang="en">

<!-- Head -->
@include('store.layout.head')
<body class="">

    @include('store.layout.navbar')


    @yield('content')


    @include('store.layout.footer')
    @include('store.layout.footer_script')

</body>

</html>
