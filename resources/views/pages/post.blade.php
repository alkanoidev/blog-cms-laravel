@extends('layouts.app', ['title' => $post->title])

@section('content')
    <div class="flex h-full relative z-0">
        <main id="main" class="w-full">
            <div
                class="lg:space-x-6 space-x-2 px-2 lg:px-6 flex lg:justify-end justify-between w-full lg:pr-2 pr-24 pb-4 pt-2">
                <div class="relative lg:w-80" id="search-container">
                    <form action="/search" method="GET" id="search-form">
                        <x-text-input placeholder="Pretrazi" icon="search" name="q" id="search-input"
                            classes="" />
                    </form>
                </div>
                <x-buttons.icon-button-tonal id="toggleThemeBtn" icon="dark_mode" type="large" />
            </div>

            <img src="/img/ui/background.svg" class="w-full absolute -z-10 rounded-b-2xl hidden dark:block" alt="">
            <img src="/img/ui/background-light.svg" class="w-full absolute -z-10 rounded-b-2xl block dark:hidden"
                alt="">

            <div
                class="mx-auto 2xl:max-w-4xl xl:max-w-4xl lg:max-w-3xl md:max-w-md sm:max-w-sm max-w-5xl pt-4
                        flex flex-col gap-4
                        lg:px-0 px-2
                        ">

                <h1 class="md:text-4xl text-3xl font-bold text-on-light dark:text-on-dark">{{ $post->title }}</h1>
                <ul class="w-min">
                    <li
                        class="ring-2 ring-on-light dark:ring-on-dark text-sm text-on-light dark:text-on-dark font-semibold font-sans px-2 py-1 rounded-lg">
                        Kategorija
                    </li>
                </ul>
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
                    <span class="author-avatar">
                        {!! $author->avatar !!}

                    </span>
                    <h2>{{ $author->firstname }} {{ $author->lastname }}
                        <br>
                        <span class="opacity-80">

                            {{ $author->username }}
                        </span>
                    </h2>
                </div>

                <article class="post-body">
                    {!! $body !!}

                </article>
            </div>
        </main>
    </div>
    <script>
        const searchInput = document.querySelector("#search-input");
        searchInput.addEventListener("focus", () => {
            document.querySelector("#search-container").children[0].style.width = "100%";
            gsap.to("#search-container", {
                width: "100%",
                duration: 0.5
            })
        })
        searchInput.addEventListener("blur", () => {
            gsap.to("#search-container", {
                width: "20rem",
                duration: 0.3
            })
        })
        searchInput.addEventListener("submit", (e) => {
            document.querySelector("#search-form").submit();
        })
    </script>

    <style scoped>
        .author-avatar svg {
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
        }
    </style>
@endsection
