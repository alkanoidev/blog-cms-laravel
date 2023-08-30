@props(['thumbnailImage' => null, 'title' => null, 'description' => null, 'href' => ''])
<article
    class="bg-surface-light dark:bg-surface-dark text-on-surface-light dark:text-on-surface-dark
           rounded-3xl w-full xl:max-w-sm lg:max-w-xs md:max-w-xs flex flex-col">
    <img src={{ $thumbnailImage }} alt={{ $title }} class="min-h-[50%] rounded-3xl relative z-0 brightness-75" />
    <div class="flex flex-col px-4 pt-4">
        <h1 class="font-bold text-2xl">{{ $title }}</h1>
        <p class="text-base mt-2">{{ $description }}</p>

    </div>
    <div class="p-4 ml-auto mt-auto">
        <x-buttons.button-tonal title="Procitaj Vise" href="{{ $href }}" />
    </div>
</article>
