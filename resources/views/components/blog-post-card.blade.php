@props(['thumbnailImage' => null, 'title' => null, 'description' => null, 'href' => '', 'category' => null])
<article
    class="bg-surface-light dark:bg-surface-dark text-on-surface-light dark:text-on-surface-dark
           rounded-3xl w-full xl:max-w-sm lg:max-w-xs md:max-w-xs flex flex-col min-h-fit">
    <img src={{ $thumbnailImage }} alt={{ $title }} class="aspect-video rounded-3xl relative z-0 brightness-75" />
    <div class="flex flex-col px-4 pt-4">
        <h1 class="font-bold text-xl">{{ $title }}</h1>
        <a href="{{ '/category/' . $category->slug }}"
            class="flex gap-2 items-center text-sm font-semibold text-primary-container-dark dark:text-primary-container-light hover:underline">
            <div class="fill-primary-container-dark dark:fill-primary-container-light">
                {!! $category->icon !!}
            </div>
            {{ $category->title }}
        </a>
        <p class="text-base mt-2">{{ $description }}</p>
    </div>
    <div class="p-4 ml-auto mt-auto">
        <x-buttons.button-filled title="Procitaj Vise" href="{{ $href }}" icon="" />
    </div>
</article>
