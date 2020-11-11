<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Home') | {{ config('app.name') }}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <livewire:styles />

        @stack('css')

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <x-nav />

            <x-aside />

            <div class="content-wrapper">

                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="#">Noria Technologies</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <livewire:scripts />
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
        @stack('js')
    </body>
</html>
