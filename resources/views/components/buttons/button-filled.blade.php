@props(['title' => null, 'icon' => null])
<a aria-label={{ $title }} href={{ $href }}
    class="py-3 px-6 transition text-center rounded-full font-semibold whitespace-nowrap
          inline-flex gap-2 justify-center
          dark:bg-primary-dark dark:text-on-primary-dark bg-primary-light text-on-primary-light
          dark:hover:bg-[#62b2f2] hover:bg-[#005786]
          dark:focus:bg-[#4397d6] focus:bg-[#004b74] focus:outline-none">
    {{ $title }}
    {{ $slot }}
    {{ $icon ? $icon : null }}
</a>
