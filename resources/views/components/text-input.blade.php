@props(['icon' => null, 'placeholder' => null, 'name' => null])

<div class="relative">
    <input
        class="bg-primary-container-light dark:bg-primary-container-dark px-6 pr-12 py-4 w-full rounded-full 
                text-lg text-on-primary-container-light dark:text-on-primary-container-dark
                placeholder:text-on-primary-container-light dark:placeholder:text-on-primary-container-dark"
        type="text" name="{{ $name }}" placeholder="{{ $placeholder }}">

    <span
        class="absolute right-6 top-1/2 -translate-y-1/2 material-symbols-rounded w-6 h-6 text-on-primary-container-light dark:text-on-primary-container-dark">{{ $icon }}</span>
</div>
