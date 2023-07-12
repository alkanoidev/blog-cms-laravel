@props(['icon' => null, 'placeholder' => null, 'name' => null, 'classes' => '', 'id' => null])

<div class="relative flex items-center {{ $classes }}">
    <input
        class="bg-surface-light dark:bg-surface-dark pl-6 pr-12 h-12 w-full rounded-full 
                text-lg text-primary-container-dark dark:text-primary-container-light
                placeholder:text-primary-container-dark dark:placeholder:text-primary-container-light
                transition-shadow duration-100 focus:outline-none
                hover:bg-primary-light dark:hover:bg-primary-dark
                hover:bg-opacity-[12%] dark:hover:bg-opacity-[8%]
              focus:bg-primary-light dark:focus:bg-primary-dark
                focus:bg-opacity-[20%] dark:focus:bg-opacity-[12%]"
        type="text" name="{{ $name }}" placeholder="{{ $placeholder }}" id="{{ $id }}">

    <span
        class="absolute right-6 top-1/2 -translate-y-1/2 material-symbols-rounded text-2xl text-primary-container-dark dark:text-primary-container-light">{{ $icon }}</span>
</div>
