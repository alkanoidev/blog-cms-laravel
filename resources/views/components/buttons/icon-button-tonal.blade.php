@props(['icon' => null, 'id' => null])
<button id="{{ $id }}"
    class="w-12 h-12 rounded-full bg-surface-light dark:bg-surface-dark shadow flex items-center justify-center
        hover:bg-primary-light dark:hover:bg-primary-dark
          hover:bg-opacity-[12%] dark:hover:bg-opacity-[12%]
          focus:bg-primary-light dark:focus:bg-primary-dark
          focus:bg-opacity-[20%] dark:focus:bg-opacity-[20%]">
    {{ $slot }}
    <span
        class="material-symbols-rounded flex items-center justify-center w-6 h-6 text-2xl text-primary-container-dark dark:text-primary-container-light">
        {{ $icon ? $icon : null }}
    </span>
</button>
