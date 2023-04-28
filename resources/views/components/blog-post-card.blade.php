@props(['imgSrc' => null, 'title' => null, 'description' => null, 'href' => null])
<article
    class="bg-surface-light dark:bg-surface-dark text-on-surface-light dark:text-on-surface-dark
           rounded-3xl w-full sm:max-w-sm">
    <img src={{ $imgSrc }} alt={{ $title }} class="rounded-3xl relative z-0 brightness-75" />
    <div class="flex flex-col p-4">
        <h1 class="font-bold text-2xl">{{ $title }}</h1>
        <p class="text-lg mb-4 mt-2">{{ $description }}</p>

        <x-buttons.button-tonal classes="ml-auto mt-auto" title="Procitaj Vise" href={{ $href }} />
    </div>
</article>
