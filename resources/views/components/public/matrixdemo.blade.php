@php
    $sources = isset($sources) ? $sources : [];
@endphp

<!DOCTYPE html>
<html lang="es">

<head>
    @viteReactRefresh
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ env('APP_NAME') }}</title>
   
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.ico') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @vite([...$sources, 'resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://cdn.sode.me/extends/notify.extend.min.js"></script> --}}
    {{-- public\js\notify.extend.min.js  --}}


    <script src="{{ asset('js/notify.extend.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    {{-- Aqui van los CSS --}}
    @yield('css_importados')

    {{-- Swipper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Alpine --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="/js/tippy.all.min.js"></script>
    <script src="/js/cookies.extend.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    {{-- Maps --}}
    

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/functions.js') }}?v={{ uniqid() }}"></script>
    

    @include('components.shortcode.contain_head')
</head>

<body class="body overflow-x-hidden">
    
    @include('components.shortcode.contain_body')

    <div class="overlay"></div>
    
    <div class="main">
        {{-- Aqui va el contenido de cada pagina --}}
        @yield('content')

    </div>


    @yield('scripts_importados')
    {{-- @vite(['resources/js/functions.js']) --}}


    <script>
        tippy('[tippy]', {
        arrow: true
        })
    </script>
</body>

</html>
