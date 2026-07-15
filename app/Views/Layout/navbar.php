<!-- Navbar -->
<?php /** @var array $notifications */ ?>

<nav
    class="navbar"
    id="navbar">

    <div class="navbar-left">

<!--         <button
            id="sidebarToggle"
            class="sidebar-toggle">

            <i class="bi bi-list"></i>

        </button> -->

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

        <div class="dropdown">

            <button
                class="icon-button"
                data-bs-toggle="dropdown">

                <i class="bi bi-bell-fill"></i>

                <?php if (count($notifications) > 0): ?>

                    <span
                        id="notification-count"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        <?= count($notifications) ?>

                    </span>

                <?php endif; ?>

            </button>

            <ul class="dropdown-menu dropdown-menu-end" style="min-width:320px;">

                <?php if (empty($notifications)): ?>

                    <li>

                        <span class="dropdown-item-text text-muted">

                            No notifications

                        </span>

                    </li>

                <?php else: ?>
                    <?php foreach ($notifications as $notification): ?>

                        <li
                            class="notification-item"
                            data-id="<?= $notification["idNotification"] ?>">

                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                    <div class="fw-semibold">
                                        <?= htmlspecialchars($notification["Text"]) ?>
                                    </div>

                                    <small class="text-muted">
                                        <?= date("d/m/Y H:i", strtotime($notification["CreatedAt"])) ?>
                                    </small>

                                </div>

                                <button
                                    type="button"
                                    class="btn btn-sm delete-notification">

                                    <i class="bi bi-x-lg"></i>

                                </button>

                            </div>

                        </li>

                    <?php endforeach; ?>

                <?php endif; ?>

            </ul>

        </div>

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
                        href="?controller=user&action=profile&id=<?= $_SESSION["user_id"] ?>">

                        <i class="bi bi-person"></i>

                        My profile

                    </a>

                </li>

                <li>

                    <a
                        class="dropdown-item"
                        href="?controller=user&action=settings">

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
<script>
    document.querySelectorAll(".delete-notification").forEach(button => {

        button.addEventListener("click", async function() {

            const item = this.closest(".notification-item");

            const id = item.dataset.id;

            const response = await fetch(
                "?controller=user&action=deleteNotification", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "idNotification=" + encodeURIComponent(id)
                }
            );

            const json = await response.json();

            if (json.success) {

                item.style.opacity = "0";
                item.style.transform = "translateX(30px)";

                setTimeout(() => {

                    item.remove();

                    const badge = document.getElementById("notification-count");

                    if (badge) {

                        let count = parseInt(badge.textContent);

                        count--;

                        if (count <= 0) {

                            badge.remove();

                        } else {

                            badge.textContent = count;

                        }

                    }

                }, 200);
            }

        });

    });
</script>