@props(['icon' => null])
<button
    class="w-14 h-14 rounded-full bg-surface-light dark:bg-surface-dark shadow flex items-center justify-center">
    {{ $slot }}
    <span class="material-symbols-rounded flex items-center justify-center w-14 h-14 text-3xl text-primary-container-dark dark:text-primary-container-light">{{ $icon }}</span>
</button>
