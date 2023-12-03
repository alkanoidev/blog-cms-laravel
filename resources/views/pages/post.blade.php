@extends('layouts.app', ['title' => $post->title])

@section('content')
    <div class="flex h-full bg-light dark:bg-dark relative z-0">
        <x-ui.sidebar :categories="$categories" />

        <main id="main" class="lg:ml-64 w-full relative">
            <div
                class="flex flex-shrink lg:pr-2 pr-[4.2rem] pb-4 pt-3 px-2 lg:pt-4 lg:space-x-6 space-x-2 lg:px-6 items-center">
                <x-buttons.button-tonal title="Nazad" icon="arrow_left_alt" href="{{ url()->previous() }}" />
                <div class="flex lg:space-x-6 space-x-2 lg:justify-end justify-end w-full">
                    <div class="sm:flex hidden relative lg:w-80" id="search-container">
                        <x-ui.search-box />
                    </div>
                    <x-buttons.icon-button-tonal id="toggleThemeBtn" icon="dark_mode" type="large" />
                </div>
            </div>
            <div class="relative sm:hidden px-2 w-full" id="search-container">
                <form action="/search" method="GET" id="search-form">
                    <x-text-input placeholder="Pretrazi" icon="search" name="q" id="search-input" classes="" />
                </form>
            </div>

            <div
                class="mx-auto 2xl:max-w-4xl xl:max-w-4xl lg:max-w-3xl md:max-w-md sm:max-w-sm max-w-5xl pt-4
                flex flex-col gap-4
                lg:px-0 px-2">

                <div>
                    <img class="rounded-xl aspect-video" src="{{ $post->thumbnail_image }}" alt="{{ $post->title }}">
                </div>

                <a href="{{ '/category/' . $post->category->slug }}"
                    class="flex gap-2 items-center text-xl font-semibold text-primary-container-dark dark:text-primary-container-light hover:underline">
                    <div class="text-primary-container-dark fill-primary-container-dark dark:fill-primary-container-light">
                        {!! $post->category->icon !!}
                    </div>
                    {{ $post->category->title }}
                </a>


                <h1 class="md:text-4xl text-3xl font-bold text-on-light dark:text-on-dark">{{ $post->title }}</h1>
                <p class="text-on-light dark:text-on-dark text-lg">{{ $post->description }}</p>
                <ul class="flex gap-2 items-center">
                    <li class="flex items-center gap-1 text-on-light dark:text-on-dark">
                        <span class="material-symbols-rounded">
                            calendar_month
                        </span>
                        {{ date_format($post->created_at, 'd.m.Y') }}
                    </li>
                    <li class="flex items-center gap-1 text-on-light dark:text-on-dark">
                        <span class="material-symbols-rounded">
                            eyeglasses
                        </span>
                        {{ $post->reading_time }} min
                    </li>
                </ul>
                <div class="flex items-center gap-2 text-on-light dark:text-on-dark text-lg">
                    <span class="[&>svg]:rounded-full [&>svg]:h-16 [&>svg]:w-16">
                        {!! $post->user->avatar !!}

                    </span>
                    <h2>{{ $post->user->firstname }} {{ $post->user->lastname }}</h2>
                </div>
                <article class="prose prose-neutral dark:prose-invert prose-img:rounded-xl">
                    {!! htmlspecialchars_decode($post->body_html) !!}
                </article>
            </div>
        </main>
    </div>
    <script>
        // const searchInput = document.querySelector("#search-input");
        // searchInput.addEventListener("focus", () => {
        //     document.querySelector("#search-container").children[0].style.width = "100%";
        //     gsap.to("#search-container", {
        //         width: "100%",
        //         duration: 0.5
        //     })
        // })
        // searchInput.addEventListener("blur", () => {
        //     gsap.to("#search-container", {
        //         width: "20rem",
        //         duration: 0.3
        //     })
        // })
        // searchInput.addEventListener("submit", (e) => {
        //     document.querySelector("#search-form").submit();
        // })
    </script>
@endsection
