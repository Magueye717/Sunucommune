<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.v1.partials.head')
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
    @include('layouts.v1.partials.navbar')

    @section('menu')
        @include('layouts.v1.partials.sidebar')
    @show

        <!-- Page Content -->
        <div class="page-wrapper" id="app">

            @section('pageheader')
                @include('layouts.v1.partials.pageheader')
            @show
            <div class="container-fluid">
                <!-- Alert -->
                <div class="row m-b-5" id="padess-alert">
                    <div class="col-sm-12">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /Alert -->

                @yield('content')
            </div>
            <!-- /.container-fluid -->
            @include('layouts.v1.partials.footer')
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('layouts.v1.partials.script')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('myJS')
    <script>
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 8000);
        });
    </script>
</body>

</html>
