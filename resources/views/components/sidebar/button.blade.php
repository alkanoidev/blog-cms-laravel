@props(['selected' => null, 'icon' => null, 'title' => null])
<a href="#"
    class="{{ $selected
        ? 'dark:bg-primary-container-dark dark:text-on-primary-container-dark bg-primary-container-light text-on-primary-container-light 
            dark:hover:bg-on-primary-dark hover:bg-[#b5cfeb]
            dark:focus:bg-on-primary-dark focus:bg-[#a4bfdb] focus:outline-none'
        : 'bg-none' }} 
        flex px-5 py-3 w-full rounded-full transition">
    <div class="space-x-2 flex items-center">
        <span class="material-symbols-rounded text-2xl text-primary-container-dark dark:text-primary-container-light">
            {{ $icon }}
        </span>
        <span
            class="text-base font-semibold text-primary-container-dark dark:text-primary-container-light">{{ $title }}</span>
    </div>
</a>
