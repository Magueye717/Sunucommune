<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.v1.partials.head')
</head>

<body class="bg">
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
    @yield('content')
</section>
@include('layouts.v1.partials.script')
<!--Style Switcher -->
<script src="{{ asset('themev1/libs/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>
