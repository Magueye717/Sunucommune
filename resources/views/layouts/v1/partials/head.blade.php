<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="PADESS PIDES SENEGAL">
<meta name="description" content="Plateforme de gestion du PADESS">
<meta name="author" content="IP3 Conseil">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('themev1/images/favicon.png') }}">
<title>{{ config('app.name', 'Padess') }}</title>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- ===== Bootstrap CSS ===== -->
<link href="{{ asset('themev1/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- ===== Plugin CSS ===== -->
<!-- ===== Animation CSS ===== -->
<link href="{{ asset('themev1/css/animate.css') }}" rel="stylesheet">
@yield('stylesAdditionnels')
<!-- ===== Custom CSS ===== -->
<link href="{{ asset('themev1/css/style.css') }}" rel="stylesheet">
<!-- ===== Color CSS ===== -->
<link href="{{ asset('themev1/css/colors/default.css') }}" id="theme" rel="stylesheet">
<!-- ===== My Custom CSS ===== -->
<link href="{{ asset('themev1/css/custom.css') }}" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('themev1/libs/sliptree-bootstrap-tokenfield/dist/css/bootstrap-tokenfield.css') }}" >
<link rel="stylesheet" href=" {{ asset('assets/fonts/flaticon/font/flaticon.css') }}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
