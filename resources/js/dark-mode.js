const toggleButton = document.getElementById("theme-toggle");

toggleButton.addEventListener("click", () => {

    const currentTheme = localStorage.getItem("theme");

    //If user does not theme set already then set it and change
    if (!currentTheme) {
        localStorage.setItem("theme", "dark"); 
        document.documentElement.classList.add("dark"); 
    } 
    
    else if (currentTheme === "dark") {
        localStorage.setItem("theme", "light");
        document.documentElement.classList.remove("dark");
    } 
    
    else {
        localStorage.setItem("theme", "dark");
        document.documentElement.classList.add("dark");
    }

});