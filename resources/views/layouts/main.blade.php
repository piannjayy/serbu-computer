<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Serbu Comp')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/iconsc.png') }}">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="font-[Poppins] bg-[#090069]">

    @auth
        @include('partials.header-user')
    @else
        @include('partials.header-guest')
    @endauth

    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
