@props(['selected' => null, 'icon' => null, 'title' => null])
<a href="#" class="{{ $selected ? 'bg-primary-container-light dark:bg-primary-container-dark' : 'bg-none' }} flex px-5 py-4 w-full rounded-full">
    <div class="space-x-2 flex items-center">
        <span class="material-symbols-rounded h-6 w-6 text-primary-container-dark dark:text-primary-container-light">
            {{ $icon }}
        </span>
        <span class="text-lg font-semibold text-primary-container-dark dark:text-primary-container-light">{{ $title }}</span>
    </div>
</a>
