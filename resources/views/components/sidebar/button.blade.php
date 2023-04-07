@props(['selected' => null, 'icon' => null, 'title' => null])
<a href="#" class="{{ $selected ? 'bg-primary-light-surface' : 'bg-none' }} flex px-5 py-4 w-full rounded-full">
    <div class="space-x-2 flex items-center">
        <span class="material-symbols-rounded h-6 w-6">
            {{ $icon }}
        </span>
        <span>{{ $title }}</span>
    </div>
</a>
