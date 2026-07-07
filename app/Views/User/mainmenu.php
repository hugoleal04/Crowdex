<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Crowdex</title>

    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Google Font -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com">

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="css/app.css">

    <link rel="stylesheet" href="css/components.css">

    <link rel="stylesheet" href="css/layout.css">

</head>
<body>

    <!-- Overlay -->

    <div
        class="overlay"
        id="overlay">
    </div>

    <!-- SIDEBAR -->

    <aside
        class="sidebar"
        id="sidebar">

        <div class="sidebar-header">

            <img
                src="media/icon.png"
                class="logo-sidebar"
                alt="Crowdex">

            <h3>Crowdex</h3>

        </div>

        <hr>

        <ul>

            <li>

                <a href="#">

                    <i class="bi bi-house-door-fill"></i>

                    Home

                </a>

            </li>

            <li>

                <a href="#">

                    <i class="bi bi-ticket-perforated-fill"></i>

                    Events

                </a>

            </li>

            <li>

                <a href="#">

                    <i class="bi bi-star-fill"></i>

                    Reviews

                </a>

            </li>

            <li>

                <a href="#">

                    <i class="bi bi-people-fill"></i>

                    Friends

                </a>

            </li>

            <li>

                <a href="#">

                    <i class="bi bi-chat-dots-fill"></i>

                    Messages

                </a>

            </li>

            <li>

                <a href="#">

                    <i class="bi bi-heart-fill"></i>

                    Following

                </a>

            </li>

            <li>

                <a href="#">

                    <i class="bi bi-person-circle"></i>

                    Profile

                </a>

            </li>

        </ul>

    </aside>

    <!-- NAVBAR -->

    <nav
        class="navbar"
        id="navbar">

        <div class="navbar-left">

            <button
                id="sidebarToggle"
                class="sidebar-toggle">

                <i class="bi bi-list"></i>

            </button>

            <a
                href="?controller=user&action=menu"
                class="brand">

                <img
                    src="media/icon.png"
                    class="logo-navbar">

                <span>

                    Crowdex

                </span>

            </a>

        </div>

        <!-- SEARCH -->

        <div class="navbar-search">

            <i class="bi bi-search"></i>

            <input

                type="text"

                placeholder="Search concerts, artists, users...">

        </div>

        <!-- RIGHT -->

        <div class="navbar-right">

            <button class="icon-button">

                <i class="bi bi-bell-fill"></i>

            </button>

            <button class="icon-button">

                <i class="bi bi-chat-left-text-fill"></i>

            </button>

            <div class="dropdown">

                <button

                    class="profile-button"

                    data-bs-toggle="dropdown">

                    <div class="profile-avatar">

                        H

                    </div>

                    <span>

                        <?= htmlspecialchars($_SESSION["name"]) ?>

                    </span>

                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a class="dropdown-item" href="#">

                            <i class="bi bi-person"></i>

                            My profile

                        </a>

                    </li>

                    <li>

                        <a class="dropdown-item" href="#">

                            <i class="bi bi-gear"></i>

                            Settings

                        </a>

                    </li>

                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <li>

                        <a

                            class="dropdown-item text-danger"

                            href="?controller=user&action=logout">

                            <i class="bi bi-box-arrow-right"></i>

                            Logout

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- DASHBOARD -->

    <div

        class="main-content"

        id="mainContent">

        <div class="container-fluid ">
            <!-- UPCOMING CONCERTS -->
            <div class="section">

                <div class="section-header">

                    <h4>Upcoming Concerts</h4>

                    <a href="#">View all</a>

                </div>

                <div class="cards-grid">

                    <div class="dashboard-card concert-card">

                        <div class="card-image"></div>

                        <div class="card-body">

                            <h5>Coldplay</h5>

                            <p>Lisbon • 21 Aug 2026</p>

                        </div>

                    </div>

                    <div class="dashboard-card concert-card">

                        <div class="card-image"></div>

                        <div class="card-body">

                            <h5>Bring Me The Horizon</h5>

                            <p>Madrid • 4 Sep 2026</p>

                        </div>

                    </div>

                    <div class="dashboard-card concert-card">

                        <div class="card-image"></div>

                        <div class="card-body">

                            <h5>Sleep Token</h5>

                            <p>London • 18 Sep 2026</p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- FRIENDS -->

            <div class="section mt-5">

                <div class="section-header">

                    <h4>Friends Activity</h4>

                    <a href="#">See more</a>

                </div>

                <div class="activity-card">

                    <div class="activity-avatar">

                        H

                    </div>

                    <div>

                        <strong>Hugo</strong>

                        reviewed

                        <strong>Coldplay</strong>

                        ★★★★★

                    </div>

                </div>

                <div class="activity-card">

                    <div class="activity-avatar">

                        J

                    </div>

                    <div>

                        <strong>João</strong>

                        is attending

                        <strong>NOS Alive</strong>

                    </div>

                </div>

            </div>

            <!-- TRENDING -->

            <div class="section mt-5">

                <div class="section-header">

                    <h4>Trending Artists</h4>

                </div>

                <div class="artists">

                    <span class="artist-pill">

                        Coldplay

                    </span>

                    <span class="artist-pill">

                        Sleep Token

                    </span>

                    <span class="artist-pill">

                        Linkin Park

                    </span>

                    <span class="artist-pill">

                        BMTH

                    </span>

                    <span class="artist-pill">

                        Ghost

                    </span>

                    <span class="artist-pill">

                        Architects

                    </span>

                </div>

            </div>

        </div>

    </div>

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