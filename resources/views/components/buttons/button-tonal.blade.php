@props(['title' => null, 'icon' => null,"href" => null])
<a aria-label={{ $title }} href={{ $href }}
    class="py-3 px-6 transition text-center rounded-full font-semibold whitespace-nowrap
          inline-flex gap-2 justify-center
          dark:bg-primary-container-dark dark:text-on-primary-container-dark bg-primary-container-light text-on-primary-container-light
          dark:hover:bg-primary-dark hover:bg-primary-container-hover-light
          dark:focus:bg-[#4397d6] focus:bg-[#b0cee0] focus:outline-none">
    {{ $title }}
    {{ $slot }}
    {{ $icon ? $icon : null }}
</a>
