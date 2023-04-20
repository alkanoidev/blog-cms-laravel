@props(['icon' => null, 'placeholder' => null, 'name' => null])

<div class="relative">
<input
        class="bg-surface-light dark:bg-surface-dark pl-6 pr-12 h-14 w-full rounded-full 
                text-lg text-primary-container-dark dark:text-primary-container-light
                placeholder:text-primary-container-dark dark:placeholder:text-primary-container-light
                focus:shadow-md transition-shadow duration-100 focus:outline-none"
        type="text" name="{{ $name }}" placeholder="{{ $placeholder }}">

    <span
        class="absolute right-6 top-1/2 -translate-y-1/2 material-symbols-rounded w-6 h-6 text-primary-container-dark dark:text-primary-container-light">{{ $icon }}</span>
</div>
