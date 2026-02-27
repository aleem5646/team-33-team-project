const toggleButton = document.getElementById("menu-toggle");
const nav = document.getElementById("nav-dropdown");
const openState = document.getElementById("open-icon");
const closedSate = document.getElementById("close-icon");

toggleButton.addEventListener("click", () => {

    //  Check if the dropdown is hidden and if so display it
    if (nav.classList.contains("hidden")) {
        nav.classList.replace("hidden", "flex");
        openState.classList.replace("flex", "hidden");
        closedSate.classList.replace("hidden", "flex");
    }
    
    // If already displayed then hide it
    else if (nav.classList.contains("flex")) {
        nav.classList.replace("flex", "hidden");
        openState.classList.replace("flex", "hidden");
        closedSate.classList.replace("hidden", "flex");
    }

});