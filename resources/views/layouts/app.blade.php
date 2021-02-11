<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('constants.app.title') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>

    @stack('stylesheets')

</head>
<body data-topbar="dark" data-layout="horizontal">

    <main class="app" id="app">

        @include('layouts.base.header')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layouts.base.footer')
        </div>

    </main>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

</body>
</html>
