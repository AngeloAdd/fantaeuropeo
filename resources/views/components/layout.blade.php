<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Fantapronostico2021'}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{$style ?? ''}}
</head>
<body>
    <button class="d-md-none btn text-primary bg-info btn-gear-custom" type="button" id="asideBtn">
        <i class="bi bi-gear-fill"></i>
    </button>
    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-md-block col-md-4 col-lg-3 col-xxl-2 px-0" id="sideBar">
                <x-_sidebar/>

            </div>
            <div class="col-12 col-md-8 col-lg-9 col-xxl-10 px-0">
                <div id="app">
                    <main class="py-4 vh-100">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>
    </div>
    
    <x-_footer/>

    
    <x-_logout />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
    <script>

        const asideBtn = document.getElementById('asideBtn');
        const sideBar = document.getElementById('sideBar');
        const asideCloseBtn = document.getElementById('asideCloseBtn');
        asideBtn.addEventListener('click', () => {
            sideBar.classList.remove('d-none');
            sideBar.classList.add('custom-position')
        })
        asideCloseBtn.addEventListener('click', ()=> {
            sideBar.classList.add('d-none');
            sideBar.classList.remove('custom-position')
        })

    </script>
</body>
</html>
