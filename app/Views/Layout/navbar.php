<!-- Navbar -->

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
                class="logo-navbar"
                alt="Crowdex">

            <span>

                Crowdex

            </span>

        </a>

    </div>

    <!-- Search -->

    <form
        class="navbar-search"
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

    <!-- Right -->

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

                    <a
                        class="dropdown-item"
                        href="#">

                        <i class="bi bi-person"></i>

                        My profile

                    </a>

                </li>

                <li>

                    <a
                        class="dropdown-item"
                        href="#">

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