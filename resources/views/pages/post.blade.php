@extends('layouts.app')

@section('content')
    <div class="flex h-full relative z-0">
        <main id="main" class="w-full pt-2 lg:pt-4">
            <div class="lg:space-x-6 space-x-2 px-2 lg:px-6 flex lg:justify-end justify-between w-full lg:pr-0 pr-24 pb-4">
                <div class="lg:w-80 w-full">
                    <x-text-input placeholder="Pretrazi" icon="search" name="search" />
                </div>
                <x-buttons.icon-button-tonal id="toggleThemeBtn" icon="dark_mode" type="large" />
            </div>

            <svg class="w-full absolute -z-10 rounded-b-2xl" viewBox="0 0 1440 350" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <rect width="1440" height="350" class="fill-primary-dark dark:fill-primary-light" />
                <g style="mix-blend-mode:screen">
                    <circle cx="1344.5" cy="89.5" r="76.5" fill="#3125B7" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1344.12" cy="89.1213" r="41.2797" fill="#3A2BE9" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1242.5" cy="220.5" r="60.5" fill="#3125B7" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1242.2" cy="220.2" r="32.646" fill="#3A2BE9" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1214.5" cy="116.5" r="27.5" fill="#3125B7" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1214.36" cy="116.364" r="14.8391" fill="#3A2BE9" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1369.5" cy="281.5" r="51.5" fill="#3125B7" />
                </g>
                <g style="mix-blend-mode:screen">
                    <circle cx="1369.24" cy="281.245" r="27.7896" fill="#3A2BE9" />
                </g>
            </svg>

            <div
                class="mx-auto 2xl:max-w-4xl xl:max-w-4xl lg:max-w-3xl md:max-w-md sm:max-w-sm max-w-5xl pt-4
                        flex flex-col gap-4">
                <ul class="w-min">
                    <li
                        class="text-on-surface-light dark:text-on-surface-dark text-sm bg-surface-light dark:bg-surface-dark px-3 py-2 rounded-xl">
                        Kategorija
                    </li>
                </ul>
                <ul class="flex gap-2 items-center">
                    <li class="flex items-center gap-1">
                        <span class="material-symbols-rounded">
                            calendar_month
                        </span>
                        {{ date_format($post->created_at, 'd.m.Y') }}
                    </li>
                    <li class="flex items-center gap-1">
                        <span class="material-symbols-rounded">
                            eyeglasses
                        </span>
                        {{ $post->reading_time }} min
                    </li>
                </ul>
                <h1 class="text-4xl font-bold">{{ $post->title }}</h1>
                <article class="post-body">
                    {!! $body !!}

                </article>
            </div>
        </main>


        <script defer>
            const toggleThemeBtn = document.getElementById("toggleThemeBtn");

            const html = document.documentElement;
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                html.classList.add("dark");
            } else {
                html.classList.remove("dark");
            }

            toggleThemeBtn.addEventListener("click", () => {
                const theme = html.classList.contains("light") ? "light" : "dark";
                if (theme === "light") {
                    html.classList.toggle("dark");
                } else {
                    html.classList.toggle("dark");
                }
            })
        </script>
    </div>
@endsection
