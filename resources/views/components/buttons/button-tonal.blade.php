@props(['title' => null, 'icon' => null, 'href' => '', 'classes' => ''])
<a aria-label={{ $title }} href={{ $href }}
    class="py-3 px-6 text-center {{ $classes }} rounded-full font-semibold whitespace-nowrap
          inline-flex gap-2 justify-center
          dark:bg-primary-container-dark dark:text-on-primary-container-dark bg-primary-container-light text-on-primary-container-light
          dark:hover:bg-on-primary-dark hover:bg-[#b5cfeb]
          dark:focus:bg-on-primary-dark focus:bg-[#a4bfdb] focus:outline-none">

    @if (!empty($icon))
        <span
            class="material-symbols-rounded flex items-center justify-center w-6 h-6 text-2xl text-primary-container-dark dark:text-primary-container-light">
            {{ $icon }}
        </span>
    @endif
    {{ $title }}
    {{ $slot }}

</a>
