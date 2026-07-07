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
<?php /** @var array $users */ ?>
<?php /** @var array $bands */ ?>
<?php /** @var array $events */ ?>


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


        <form class="navbar-search"
            method="GET"
            action="?controller=user&action=search">

            <input
                type="hidden"
                name="controller"
                value="user">

            <input
                type="hidden"
                name="action"
                value="search">

            <i class="bi bi-search"></i>

            <input
                type="text"
                name="query"
                placeholder="Search concerts, artists, users...">

        </form>

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

                        <img
                            src="<?= htmlspecialchars($_SESSION["pfp"]) ?>"
                            alt="<?= htmlspecialchars($_SESSION["name"]) ?>">

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

        <div class="search-page">

            <section class="search-section">

                <div class="section-header">

                    <h3>
                        <i class="bi bi-people-fill"></i>

                        Users
                    </h3>

                </div>

                <div class="results-grid">
                    <?php foreach ($users as $user) { ?>
                        <div class="result-card">
                            <img
                                src="<?= $user["PFP"] ?>"
                                class="result-avatar"
                                alt="Profile">
                            <h6><?= $user["Name"] ?></h6>
                            <small>@<?= $user["Username"] ?></small>
                        </div>
                    <?php } ?>

                </div>

            </section>

            <section class="search-section">

                <div class="section-header">

                    <h3>
                        <i class="bi bi-music-note-beamed"></i>

                        Artists
                    </h3>

                </div>

                <div class="results-grid">
                    <?php foreach ($bands as $band) { ?>
                        <div class="result-card">

                            <img
                                src="<?= $band["ProfileImage"] ?>"
                                class="result-avatar">

                            <h6><?= $band["Name"] ?></h6>

                            <small>

                                <?php foreach ($band["Genres"] as $genre): ?>

                                    <?= htmlspecialchars($genre["Name"]) ?>

                                <?php endforeach; ?>

                            </small>

                        </div>
                    <?php } ?>
                </div>

            </section>

            <section class="search-section">

                <div class="section-header">

                    <h3>
                        <i class="bi bi-ticket-perforated-fill"></i>

                        Events
                    </h3>

                </div>

                <div class="results-grid">
                    <?php foreach ($events as $event) { ?>

                        <div class="event-card">

                            <h5 class="event-title">

                                <?= htmlspecialchars($event["Title"]) ?>

                            </h5>

                            <div class="event-info">

                                <span>

                                    <i class="bi bi-calendar-event"></i>

                                    <?= date("d M Y", strtotime($event["StartDateTime"])) ?>

                                </span>

                                <span>

                                    <i class="bi bi-clock"></i>

                                    <?= date("H:i", strtotime($event["StartDateTime"])) ?>

                                </span>

                                <span>

                                    <i class="bi bi-geo-alt-fill"></i>

                                    <?= htmlspecialchars($event["City"]) ?>

                                </span>

                            </div>

                            <a href="#" class="event-link">

                                View event

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>

                    <?php } ?>
                </div>

            </section>

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