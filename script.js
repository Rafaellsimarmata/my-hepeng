document.addEventListener("DOMContentLoaded", function () {
    var sidebar = document.getElementById("sidebar");
    var sidebarCollapse = document.getElementById("sidebarCollapse");
    var main = document.querySelector("main");

    sidebarCollapse.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");

        // Adjust the margin of the main element based on the collapsed state
        main.style.marginLeft = sidebar.classList.contains("collapsed") ? "0" : "20vw";
    });

    // Check if the sidebar is initially collapsed and adjust the main margin accordingly
    if (sidebar.classList.contains("collapsed")) {
        main.style.marginLeft = "0";
    }
});
