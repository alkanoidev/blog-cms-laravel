@props(['icon' => null])
<button
    class="w-10 h-10 rounded-full bg-primary-container-light dark:bg-primary-container-dark shadow flex items-center justify-center">
    {{ $slot }}
    <span class="material-symbols-rounded w-6 h-6 text-on-primary-container-light dark:text-on-primary-container-dark"> {{ $icon }}</span>
</button>
