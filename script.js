document.addEventListener("DOMContentLoaded", function () {
    var sidebar = document.getElementById("sidebar");
    var sidebarCollapse = document.getElementById("sidebarCollapse");
    var main = document.querySelector("main");
    var utama = document.querySelector("section.utama");

    sidebarCollapse.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");

        // Adjust the margin of the main element based on the collapsed state
        main.style.marginLeft = sidebar.classList.contains("collapsed") ? "0" : "20vw";
        utama.style.width = sidebar.classList.contains("collapsed") ? "100vw" : "80vw";
    });

    // Check if the sidebar is initially collapsed and adjust the main margin accordingly
    if (sidebar.classList.contains("collapsed")) {
        main.style.marginLeft = "0";
        utama.style.width = "100vw";

    }
});
