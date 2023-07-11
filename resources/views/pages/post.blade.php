@extends('layouts.app', ["title" => $post->title])

@section('content')
    <div class="flex h-full relative z-0">
        <main id="main" class="w-full">
            <div
                class="lg:space-x-6 space-x-2 px-2 lg:px-6 flex lg:justify-end justify-between w-full lg:pr-2 pr-24 pb-4 pt-2">
                <div class="lg:w-80 w-full">
                    <x-text-input placeholder="Pretrazi" icon="search" name="search" />
                </div>
                <x-buttons.icon-button-tonal id="toggleThemeBtn" icon="dark_mode" type="large" />
            </div>

            <img src="/img/ui/background.png" class="w-full absolute -z-10 rounded-b-2xl hidden dark:block" alt="">
            <img src="/img/ui/background-light.png" class="w-full absolute -z-10 rounded-b-2xl block dark:hidden" alt="">

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

                <article class="post-body">
                    {!! $body !!}

                </article>
            </div>
        </main>
    </div>
@endsection
