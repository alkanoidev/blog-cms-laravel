@props(['href' => null, 'selected' => null, 'icon' => null, 'title' => null])
<a href="{{ $href }}"
    class="flex px-5 py-3 w-full rounded-full
        hover:bg-primary-light dark:hover:bg-primary-dark
          hover:bg-opacity-[12%] dark:hover:bg-opacity-[12%]
        dark:focus:bg-on-primary-dark focus:bg-[#a4bfdb] focus:outline-none
        {{ $selected
            ? 'dark:bg-primary-container-dark dark:text-on-primary-container-dark bg-primary-container-light text-on-primary-container-light dark:hover:bg-primary-container-dark hover:bg-primary-container-light'
            : '' }} ">
    <div class="space-x-2 flex items-center">
        <span class="text-primary-container-dark fill-primary-container-dark dark:fill-primary-container-light">
            {!! $icon !!}
        </span>
        <span
            class="text-base font-semibold text-primary-container-dark dark:text-primary-container-light">{{ $title }}</span>
    </div>
</a>
