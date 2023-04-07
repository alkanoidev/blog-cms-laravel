<aside
    class="sidebar w-80 absolute sm:relative bg-primary-light text-on-primary-light shadow md:h-full flex-col justify-between hidden sm:flex rounded-r-3xl">
    <div class="flex flex-col px-3 pt-[24px]">
        <h1 class="text-xl font-bold">Blog</h1>

        <div>
            <h2 class="font-bold">Kategorije</h2>
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

<aside class="w-64 z-40 absolute inset-0 bg-primary-light shadow sm:hidden flex transition duration-150 ease-in-out"
    id="mobile-nav">
</aside>
<button aria-label="toggle sidebar" id="openSideBar"
    class="w-10 h-10 sm:hidden bg-primary-light fixed right-2 top-2 flex items-center shadow justify-center cursor-pointer rounded-xl"
    onclick="sidebarHandler(true)">
    <span class="material-symbols-rounded text-on-primary-light">
        menu
    </span>
</button>
<button aria-label="Close sidebar" id="closeSideBar"
    class="w-10 h-10 hidden sm:hidden bg-primary-light fixed right-2 top-2 flex items-center shadow justify-center cursor-pointer rounded-xl"
    onclick="sidebarHandler(false)">
    <span class="material-symbols-rounded text-on-primary-light">
        close
    </span>
</button>

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
        } else {
            sideBar.style.transform = "translateX(-16rem)";
            closeSidebar.classList.add("hidden");
            openSidebar.classList.remove("hidden");
        }
    }
</script>
