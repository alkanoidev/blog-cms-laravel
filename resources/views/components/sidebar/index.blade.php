<aside
    class="sidebar w-80 relative bg-surface-light dark:bg-surface-dark text-on-primary-container-light dark:text-on-primary-container-dark shadow md:h-full flex-col justify-between hidden sm:flex rounded-r-3xl">
    <div class="flex flex-col px-3 pt-[24px]">
        <h1 class="text-2xl pl-4 pb-6 font-bold text-primary-container-dark dark:text-primary-container-light">Blog</h1>

        <div>
            <h2 class="font-semibold pb-2 pl-4 text-xl">Kategorije</h2>
            <div>
                <x-sidebar.button selected="{{ Route::current()->getName() == 'home' }}" icon="change_history"
                    title="Sve Kategorije"></x-sidebar.button>
            </div>
            <div>
                <x-sidebar.button selected="{{ Route::current()->getName() == 'android' }}" icon="change_history"
                    title="Android"></x-sidebar.button>
            </div>
        </div>
    </div>
</aside>

<aside
    class="w-64 z-40 absolute inset-0 bg-surface-light dark:bg-surface-dark text-on-primary-container-light dark:text-on-primary-container-dark shadow sm:hidden flex transition duration-150 ease-in-out rounded-r-3xl"
    id="mobile-nav">
</aside>
<div aria-label="toggle sidebar" id="openSideBar" onclick="sidebarHandler(true)"
    class="w-14 h-14 sm:hidden z-10 fixed right-2 top-2 flex items-center justify-center cursor-pointer">
    <x-buttons.icon-button-tonal icon="menu" />
</div>
<div aria-label="Close sidebar" id="closeSideBar"
    class="w-14 h-14 hidden sm:hidden z-10 fixed right-2 top-2 flex items-center justify-center cursor-pointer"
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
