document.addEventListener("DOMContentLoaded", function () {
    console.log("dropdown JS loaded.");
    const optionsButton = document.getElementById("options-button");
    const optionsDropdown = document.getElementById("options-dropdown");

    optionsButton.addEventListener("click", function (e) {
        e.stopPropagation();
        optionsDropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", function () {
        optionsDropdown.classList.add("hidden");
    });

    optionsDropdown.addEventListener("click", function (e) {
        e.stopPropagation();
    });
});
