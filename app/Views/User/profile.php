<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>
<?php /** @var array $user */ ?>
<div class="main-content" id="mainContent">

    <div class="container py-5">

        <div class="row g-4">

            <!-- LEFT COLUMN -->

            <div class="col-lg-4">

                <div class="dashboard-card p-4 text-center">

                    <img
                        src="<?= htmlspecialchars($user["PFP"]) ?>"
                        class="profile-picture mb-3">

                    <h2 class="mb-1">

                        <?= htmlspecialchars($user["Name"]) ?>

                    </h2>

                    <p class="text-muted mb-4">

                        @<?= htmlspecialchars($user["Username"]) ?>

                    </p>

                    <?php if ($user["idUser"] == $_SESSION["user_id"]): ?>

                        <a
                            href="?controller=user&action=settings"
                            class="btn btn-crowdex w-100 mb-4">

                            Edit profile

                        </a>

                    <?php else: ?>

                        <form method="POST" action="?controller=user&action=followUnfollow">

                            <input type="hidden" name="redirect" value="profile">
                            <input
                                type="hidden"
                                name="idFollow"
                                value="<?= $user["idUser"] ?>">

                            <input
                                type="hidden"
                                name="Request"
                                value="<?= $user["Following"] ? 0 : 1 ?>">

                            <button
                                type="submit"
                                class="btn <?= $user["Following"] ? "btn-outline-secondary" : "btn-crowdex" ?> w-100 mb-4">

                                <?php if ($user["Following"]): ?>

                                    <i class="bi bi-check-lg"></i>

                                    Following

                                <?php else: ?>

                                    <i class="bi bi-person-plus-fill"></i>

                                    Follow

                                <?php endif; ?>

                            </button>

                        </form>

                    <?php endif; ?>




                    <div class="row text-center">

                        <div class="col-6 mb-4">

                            <h3 class="mb-0">0</h3>

                            <small class="text-muted">

                                Followers

                            </small>

                        </div>

                        <div class="col-6 mb-4">

                            <h3 class="mb-0">0</h3>

                            <small class="text-muted">

                                Following

                            </small>

                        </div>

                        <div class="col-6">

                            <h3 class="mb-0">0</h3>

                            <small class="text-muted">

                                Reviews

                            </small>

                        </div>

                        <div class="col-6">

                            <h3 class="mb-0">0</h3>

                            <small class="text-muted">

                                Concerts

                            </small>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT COLUMN -->

            <div class="col-lg-8">

                <div class="dashboard-card mb-4">

                    <div class="card-body">

                        <h4>

                            <i class="bi bi-person-lines-fill"></i>

                            About

                        </h4>

                        <p class="text-muted mb-0">

                            No bio yet.

                        </p>

                    </div>

                </div>

                <div class="dashboard-card mb-4">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h4 class="mb-0">

                                <i class="bi bi-music-note-beamed"></i>

                                Favourite Artists

                            </h4>

                        </div>

                        <p class="text-muted mb-0">

                            No favourite artists yet.

                        </p>

                    </div>

                </div>

                <div class="dashboard-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h4 class="mb-0">

                                <i class="bi bi-star-fill"></i>

                                Recent Reviews

                            </h4>

                        </div>

                        <p class="text-muted mb-0">

                            No reviews yet.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>