const toggleButton = document.getElementById("menu-toggle");
const nav = document.getElementById("nav-dropdown");
const openState = document.getElementById("open-icon");
const closedSate = document.getElementById("close-icon");

toggleButton.addEventListener("click", () => {
    //  Check if the dropdown is hidden and if so display it
    if (nav.classList.contains("hidden")) {
        nav.classList.replace("hidden", "flex");
        openState.classList.add("hidden");
        closedSate.classList.replace("hidden", "flex");
    }

    // If already displayed then hide it
    else {
        nav.classList.replace("flex", "hidden");
        openState.classList.replace("hidden", "flex");
        closedSate.classList.replace("flex", "hidden");
    }
});
