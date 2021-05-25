<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{$style ?? ''}}
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="d-none d-md-block col-md-4 col-lg-3 col-xxl-2 px-0">
            <x-_sidebar/>

        </div>
        <div class="col-12 col-md-8 col-lg-9 col-xxl-10 px-0">
            <div id="app">
            <x-_navbar/>

                <main class="py-4">
                    {{$slot}}
                </main>
            </div>
        </div>
    </div>
</div>
    
    <x-_footer/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
