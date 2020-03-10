<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.portail.partials._head')
</head>

<body>

<!--====== PRELOADER PART START ======-->

<div class="preloader" id="preloader">
    <div class="three ">
        <div class="loader" id="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<!--====== PRELOADER PART START ======-->

<!--====== HEADER PART START ======-->

<header class="header-area">
    @include('layouts.portail.partials._header')

</header>

<!--====== HEADER PART ENDS ======-->
@yield('content')
<!--====== FOOTER PART START ======-->

<footer class="footer-area pt-30">
    @include('layouts.portail.partials._footer')

</footer>

<!--====== FOOTER PART ENDS ======-->

<!--====== Scripts PART START ======-->

<!--====== SCRIPTS PART ENDS ======-->



@include('layouts.portail.partials._scripts')
@include('layouts.v1.partials.script')
@stack('myJS')
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").alert('close');
        }, 8000);
    });
</script>

</body>

</html>
