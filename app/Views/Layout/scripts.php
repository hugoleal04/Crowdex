<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById("sidebar");

    const overlay = document.getElementById("overlay");

    const navbar = document.getElementById("navbar");

    const main = document.getElementById("mainContent");

    const toggle = document.getElementById("sidebarToggle");

    function toggleSidebar() {

        sidebar.classList.toggle("active");

        overlay.classList.toggle("active");

        navbar.classList.toggle("shifted");

        main.classList.toggle("shifted");

    }

    toggle.addEventListener("click", toggleSidebar);

    overlay.addEventListener("click", toggleSidebar);

    document.addEventListener("keydown", function(e) {

        if (e.key === "Escape" && sidebar.classList.contains("active")) {

            toggleSidebar();

        }

    });
</script>

</body>

</html>