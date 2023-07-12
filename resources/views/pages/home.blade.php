@extends('layouts.app', ['title' => 'Početna'])

@section('content')
    <div class="flex h-full relative z-0">
        <x-sidebar />
        <main id="main" class="lg:ml-80 w-full pt-2 px-2 lg:pt-4 lg:px-6">
            <div class="lg:space-x-2 space-x-2 flex justify-end w-full lg:pr-0 pr-24">
                <div class="relative lg:w-80" id="search-container">
                    <form action="/search" method="GET" id="search-form">
                        <x-text-input placeholder="Pretrazi" icon="search" name="q" id="search-input"
                            classes="" />
                    </form>
                </div>
                <x-buttons.icon-button-tonal id="toggleThemeBtn" icon="dark_mode" type="large" />
            </div>
            <div
                class="mt-4 from-primary-light to-secondary-light rounded-3xl w-full h-[450px] grid place-items-center py-6 bg-cover
            bg-[url('https://images.unsplash.com/photo-1681927269046-1263e3282bb8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80')]
            z-0 relative
            before:absolute before:w-full before:h-full before:top-0 before:left-0 before:bg-black/50 before:-z-[1] before:rounded-3xl
            ">
                <div class="text-center px-3 lg:px-0">
                    <h1 class="sm:text-2xl text-3xl font-bold text-on-primary-light">Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Recusandae, nostrum.</h1>
                    <p class="sm:text-lg text-base max-w-2xl mx-auto text-on-primary-light">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Sed, placeat ad? Quam, vitae natus accusantium cupiditate consequuntur
                        laudantium ea omnis.</p>

                    <div class="mt-12">
                        <x-buttons.button-tonal title="Procitaj Vise" href="#" icon="" />
                    </div>
                </div>
            </div>

            <div class="flex w-full flex-wrap justify-center gap-4 mt-4">
                @foreach ($posts as $post)
                    <x-blog-post-card
                        imgSrc="https://images.unsplash.com/photo-1681927269046-1263e3282bb8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80"
                        title="{{ $post->title }}"
                        description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, quibusdam."
                        href="/post/{{ $post->slug }}" />
                @endforeach
            </div>
            <div class="flex justify-center mt-4">
                {{ $posts->links('vendor.pagination.tailwind') }}
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
@endsection
