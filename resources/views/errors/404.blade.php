<!DOCTYPE html>
<html lang="en" class="h-full w-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Najjaci blog</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    @yield('head')
</head>

<body class="{{ $class ?? '' }} bg-light dark:bg-dark h-full w-full grid place-content-center">
    <main class="text-center space-y-4">
        <div>
            <h1 class="text-3xl">Došlo je do greške</h1>
            <h2 class="text-3xl text-primary-light dark:text-primary-dark font-bold">404</h2>
        </div>
        <p class="max-w-sm">Stranica nije pronađena. Moguće je da tražena stranica više ne postoji ili je link
            pogrešan/promenjen.</p>
        <x-buttons.button-filled title="Nazad" href="{{ url()->previous() }}" />
    </main>
</body>

</html>
