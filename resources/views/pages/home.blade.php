@extends('layouts.app', ['title' => 'Početna'])

@section('content')
    <div class="flex h-full relative z-0">
        <x-ui.sidebar :categories="$categories" />
        <main id="main" class="lg:ml-64 w-full pt-2 px-2 lg:pt-4 lg:px-6">
            <div class="lg:space-x-2 space-x-2 flex justify-end w-full lg:pr-0 pr-16 md:pt-0 pt-1">
                <div class="relative lg:w-80" id="search-container">
                    <x-ui.search-box />
                </div>
                <x-buttons.icon-button-tonal id="toggleThemeBtn" icon="dark_mode" type="large" />
            </div>
            <div
                class="mt-4 from-primary-light to-secondary-light rounded-3xl w-full h-[450px] grid place-items-center py-6 bg-cover
                    bg-[url('https://images.unsplash.com/photo-1579548122080-c35fd6820ecb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')]
                    z-0 relative
                    before:absolute before:w-full before:h-full before:top-0 before:left-0 before:bg-black/50 before:-z-[1] before:rounded-3xl
                    ">
                <div class="text-center px-3 lg:px-0">
                    <h1 class="sm:text-2xl text-3xl font-bold text-on-primary-light">
                        {{ $highlightedPost->title }}
                    </h1>
                    <p class="sm:text-lg text-base max-w-2xl mx-auto text-on-primary-light">
                        {{ $highlightedPost->description }}</p>
                    <div class="mt-12">
                        <x-buttons.button-filled title="Procitaj Vise" href="/post/{{ $highlightedPost->slug }}"
                            icon="" />
                    </div>
                </div>
            </div>
            <div class="flex w-full flex-wrap justify-center gap-4 mt-4">
                @isset($result)
                    @if (count($result) != 0)
                        @foreach ($result as $post)
                            <x-blog-post-card thumbnailImage="{{ $post->thumbnail_image }}" title="{{ $post->title }}"
                                description="{{ substr($post->description, 0, 120) . '...' }}" :href="'/post/' . $post->slug"
                                :category="$post->category" />
                        @endforeach
                    @else
                        <div class="flex items-center gap-2 text-on-light dark:text-on-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-search-x">
                                <path d="m13.5 8.5-5 5" />
                                <path d="m8.5 8.5 5 5" />
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                            <h2 class="text-xl">Found 0 posts.</h2>
                        </div>
                    @endif
                @endisset

                @isset($posts)
                    @if (count($posts) != 0)
                        @foreach ($posts as $post)
                            <x-blog-post-card thumbnailImage="{{ $post->thumbnail_image }}" title="{{ $post->title }}"
                                description="{{ substr($post->description, 0, 120) . '...' }}" :href="'/post/' . $post->slug"
                                :category="$post->category" />
                        @endforeach
                    @else
                        <h1 class="text-center text-on-light dark:text-on-dark mt-4 text-xl">Found 0 posts</h1>
                    @endif
                @endisset
            </div>
            <div class="flex justify-center mt-4">
                @isset($posts)
                    {{ $posts->links('vendor.pagination.tailwind') }}
                @endisset
                @isset($result)
                    {{ $result->links('vendor.pagination.tailwind') }}
                @endisset
            </div>
        </main>
    </div>
@endsection
