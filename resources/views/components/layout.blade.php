<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="og:title" content="FantaEuropeo2021">
    <meta name="og:description" content="Gioco normale tra amici fidati, niente soldi, finanza pussa via!!!">
    <meta name="og:image" content="/img/bannereuro.jpg">
    <meta name="og:url" content="https://fantaeuropeo2021.com">

    <title>{{ $title ?? 'Fantapronostico2021'}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{$style ?? ''}}
</head>
<body>
    <button class="d-md-none btn text-primary bg-info btn-gear-custom" type="button" id="asideBtn">
        <i class="bi bi-gear-fill"></i>
    </button>
    <div class="d-none d-md-block px-0" id="sideBar">
        <x-_sidebar/>
    </div>
    <main class="py-4 vh-100">
        {{$slot}}
    </main>
    
    <x-_footer/>

    
    <x-_logout />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
    
</body>
</html>
