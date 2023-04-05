<aside class="sidebar w-80 absolute sm:relative bg-primary-light text-on-primary-light shadow md:h-full flex-col justify-between hidden sm:flex rounded-r-3xl">
    <div class="flex flex-col px-3 pt-[24px]">
        <h1 class="text-xl font-bold">Blog</h1>

        <div>
            <h2 class="font-bold">Kategorije</h2>
            <div>
                <x-sidebar.button></x-sidebar.button>
            </div>
        </div>
    </div>
</aside>

<aside class="w-80 z-40 absolute inset-0 bg-primary-light shadow sm:hidden flex transition duration-150 ease-in-out"
    id="mobile-nav">
    <button aria-label="toggle sidebar" id="openSideBar"
        class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
        onclick="sidebarHandler(true)">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20"
            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <circle cx="6" cy="10" r="2" />
            <line x1="6" y1="4" x2="6" y2="8" />
            <line x1="6" y1="12" x2="6" y2="20" />
            <circle cx="12" cy="16" r="2" />
            <line x1="12" y1="4" x2="12" y2="14" />
            <line x1="12" y1="18" x2="12" y2="20" />
            <circle cx="18" cy="7" r="2" />
            <line x1="18" y1="4" x2="18" y2="5" />
            <line x1="18" y1="9" x2="18" y2="20" />
        </svg>
    </button>
    <button aria-label="Close sidebar" id="closeSideBar"
        class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
        onclick="sidebarHandler(false)">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
    </button>
</aside>

<script>
    var sideBar = document.getElementById("mobile-nav");
    var openSidebar = document.getElementById("openSideBar");
    var closeSidebar = document.getElementById("closeSideBar");
    sideBar.style.transform = "translateX(-260px)";

    function sidebarHandler(flag) {
        if (flag) {
            sideBar.style.transform = "translateX(0px)";
            openSidebar.classList.add("hidden");
            closeSidebar.classList.remove("hidden");
        } else {
            sideBar.style.transform = "translateX(-260px)";
            closeSidebar.classList.add("hidden");
            openSidebar.classList.remove("hidden");
        }
    }
</script>
