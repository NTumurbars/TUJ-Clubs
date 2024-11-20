document.addEventListener("DOMContentLoaded", () => {
    console.log("Navbar JS loaded.");

    const userMenuButton = document.getElementById("user-menu-button");
    const userMenuDropdown = userMenuButton.nextElementSibling;

    userMenuButton.addEventListener("click", (e) => {
        e.stopPropagation();
        userMenuDropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (
            !userMenuDropdown.classList.contains("hidden") &&
            !userMenuButton.contains(e.target) &&
            !userMenuDropdown.contains(e.target)
        ) {
            userMenuDropdown.classList.add("hidden");
        }
    });
});
