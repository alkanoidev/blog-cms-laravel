<!DOCTYPE html>
<html lang="en" class="h-full w-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $title }}</title>
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

<body class="{{ $class ?? '' }} bg-light dark:bg-dark h-full w-full lg:px-0">
    @yield('content')


    {{-- GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"
        integrity="sha512-JO6JyFPJupQKZf7icgZkHwuq/rAQxH7COqvEd4WdK52AtHPedwHog05T69pIelI69jVN/zZbW6TuHfH2mS8j/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script defer>
        const toggleThemeBtn = document.getElementById("toggleThemeBtn");

        const html = document.documentElement;

        if (localStorage.getItem("theme") != null) {
            if (localStorage.getItem("theme") == "dark" || localStorage.getItem("theme") === "dark") {
                html.classList.add("dark");
                localStorage.setItem("theme", "dark");
            } else {
                html.classList.remove("dark");
                localStorage.setItem("theme", "light");
            }
        } else {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                html.classList.add("dark");
                localStorage.setItem("theme", "dark");
            } else {
                html.classList.remove("dark");
                localStorage.setItem("theme", "light");
            }
        }

        toggleThemeBtn.addEventListener("click", () => {
            const theme = html.classList.contains("dark") ? "dark" : "light";
            if (theme === "light") {
                html.classList.toggle("dark");
                localStorage.setItem("theme", "dark");
            } else {
                html.classList.toggle("dark");
                localStorage.setItem("theme", "light");
            }
        })
    </script>
</body>

</html>
