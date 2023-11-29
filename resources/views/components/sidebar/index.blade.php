@props(['categories' => []])

<aside
    class="sidebar w-64 fixed bg-surface-light dark:bg-surface-dark text-on-surface-light dark:text-on-surface-dark lg:h-full flex-col justify-between hidden lg:flex rounded-r-3xl">
    <div class="flex flex-col px-3 pt-[24px]">
        <a class="navbar-brand m-0 pl-4 pb-6 flex items-center space-x-2" href="{{ route('home') }}">
            <img src="/img/logo.svg" class="h-8" alt="main_logo">
            <span class="text-2xl font-bold text-on-surface-light dark:text-on-surface-dark">
                {{ config('app.name') }}
            </span>
        </a>
        <div>
            <h2 class="font-semibold pb-2 pl-4 text-xl">Kategorije</h2>
            <div>
                <x-sidebar.button selected="{{ Route::current()->getName() == 'home' }}" :href="route('home')"
                    icon="<svg xmlns='http://www.w3.org/2000/svg' height='24' viewBox='0 -960 960 960' width='24'><path d='M152-160q-23 0-35-20.5t1-40.5l328-525q12-19 34-19t34 19l328 525q13 20 1 40.5T808-160H152Zm72-80h512L480-650 224-240Zm256-205Z'/></svg>"
                    title="Sve Kategorije"></x-sidebar.button>
            </div>

            @foreach ($categories as $category)
                <x-sidebar.button selected="{{ request()->path() == $category->slug }}" :href="'/category/' . $category->slug"
                    icon="{!! $category->icon !!}" title="{{ $category->title }}"></x-sidebar.button>
            @endforeach
        </div>
    </div>
</aside>

<aside
    class="w-64 z-40 fixed inset-0 bg-surface-light dark:bg-surface-dark text-on-surface-light dark:text-on-surface-dark lg:hidden flex transition duration-150 ease-in-out rounded-r-3xl"
    id="mobile-nav">
</aside>
<div aria-label="toggle sidebar" id="openSideBar" onclick="sidebarHandler(true)"
    class="w-14 h-14 lg:hidden z-10 fixed right-2 top-2 flex items-center justify-center cursor-pointer">
    <x-buttons.icon-button-tonal icon="menu" />
</div>
<div aria-label="Close sidebar" id="closeSideBar"
    class="w-14 h-14 hidden lg:hidden z-10 fixed right-2 top-2 flex items-center justify-center cursor-pointer"
    onclick="sidebarHandler(false)">
    <x-buttons.icon-button-tonal icon="close" />
</div>

<script>
    var sideBar = document.getElementById("mobile-nav");
    var openSidebar = document.getElementById("openSideBar");
    var closeSidebar = document.getElementById("closeSideBar");
    sideBar.style.transform = "translateX(-16rem)";

    function sidebarHandler(flag) {
        if (flag) {
            sideBar.style.transform = "translateX(0px)";
            openSidebar.classList.add("hidden");
            closeSidebar.classList.remove("hidden");
            document.getElementById("main").classList.add("blur-sm");
            document.getElementById("main").classList.add("bg-black/10");
        } else {
            sideBar.style.transform = "translateX(-16rem)";
            closeSidebar.classList.add("hidden");
            openSidebar.classList.remove("hidden");
            document.getElementById("main").classList.remove("blur-sm");
            document.getElementById("main").classList.remove("bg-black/10");
        }
    }
</script>
