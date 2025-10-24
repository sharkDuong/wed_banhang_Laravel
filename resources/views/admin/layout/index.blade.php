<!doctype html>
<html lang="en">

@include('admin.layout.components.head')

<!-- [Body] Start -->

<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    @include('admin.layout.components.nav')
    @include('admin.layout.components.header')

    <div class="pc-container">
        @yield('content')
    </div>

    @include('admin.layout.components.footer')
    @include('admin.layout.components.script')
</body><!-- [Body] end -->

</html>