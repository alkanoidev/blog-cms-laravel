<div class="relative lg:w-80" id="search-container">
    <form action="/search" method="GET" id="search-form" role="search">
        <x-text-input placeholder="Pretrazi" icon="search" name="q" id="search-input" classes="" />
    </form>
</div>

<script>
    const searchInput = document.querySelector("#search-input");

    if (window.matchMedia("(min-width: 768px)").matches) {
        searchInput.addEventListener("focus", () => {
            document.querySelector("#search-container").children[0].style.width = "100%";
            gsap.to("#search-container", {
                width: "100%",
                duration: 0.5
            })
        })
        searchInput.addEventListener("blur", () => {
            gsap.to("#search-container", {
                width: "20rem",
                duration: 0.3
            })
        })
        searchInput.addEventListener("submit", (e) => {
            document.querySelector("#search-form").submit();
        })
    }
</script>
