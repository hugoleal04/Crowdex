<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>

<div class="main-content" id="mainContent">

    <div class="container py-5">

        <div class="row g-4">

            <!-- LEFT COLUMN -->

            <div class="col-lg-4">

                <div class="dashboard-card p-4 text-center">

                    <img
                        src="<?= htmlspecialchars($band["ProfileImage"]) ?>"
                        class="profile-picture mb-3">

                    <h2 class="mb-2">

                        <?= htmlspecialchars($band["Name"]) ?>

                    </h2>

                    <p class="text-muted mb-4">

                        <?php foreach ($band["Genres"] as $genre): ?>

                            <?= htmlspecialchars($genre["Name"]) ?>

                        <?php endforeach; ?>

                    </p>

                    <form method="POST" action="?controller=band&action=followUnfollow">

                        <input type="hidden" name="redirect" value="profile">
                        <input
                            type="hidden"
                            name="idFollow"
                            value="<?= $band["idBand"] ?>">

                        <input
                            type="hidden"
                            name="Request"
                            value="<?= $band["Following"] ? 0 : 1 ?>">

                        <button
                            type="submit"
                            class="btn <?= $band["Following"] ? "btn-outline-secondary" : "btn-crowdex" ?> w-100 mb-4">

                            <?php if ($band["Following"]): ?>

                                <i class="bi bi-check-lg"></i>

                                Following

                            <?php else: ?>

                                <i class="bi bi-person-plus-fill"></i>

                                Follow

                            <?php endif; ?>

                        </button>

                    </form>

                    <div class="row text-center">

                        <div class="col-4">

                            <h3><?= $followers ?></h3>

                            <small class="text-muted">

                                Followers

                            </small>

                        </div>

                        <div class="col-4">

                            <h3 class="mb-0">

                                <?= htmlspecialchars($band["FormedYear"]) ?>

                            </h3>

                            <small class="text-muted">

                                Formed

                            </small>

                        </div>

                        <div class="col-4">

                            <h3 class="mb-0">

                                <?= count($concerts) ?>

                            </h3>

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

                            <i class="bi bi-info-circle-fill"></i>

                            About

                        </h4>

                        <p class="text-muted mb-0">

                            <?= nl2br(htmlspecialchars($band["Description"])) ?>

                        </p>

                    </div>

                </div>

                <div class="dashboard-card">

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <h4 class="mb-0">

                                <i class="bi bi-music-note-beamed"></i>

                                Concerts

                            </h4>

                        </div>

                        <?php if (empty($concerts)): ?>

                            <p class="text-muted mb-0">

                                No concerts available.

                            </p>

                        <?php else: ?>

                            <?php foreach ($concerts as $concert): ?>

                                <div class="event-card mb-3">

                                    <h5 class="event-title">

                                        <?= htmlspecialchars($concert["EventTitle"]) ?>

                                    </h5>

                                    <div class="event-info">

                                        <span>

                                            <i class="bi bi-calendar-event"></i>

                                            <?= date("d M Y", strtotime($concert["StartDateTime"])) ?>

                                        </span>

                                        <span>

                                            <i class="bi bi-clock"></i>

                                            <?= date("H:i", strtotime($concert["StartDateTime"])) ?>

                                        </span>

                                        <span>

                                            <i class="bi bi-mic-fill"></i>

                                            <?= htmlspecialchars($concert["Stage"]) ?>

                                        </span>

                                        <span>

                                            <i class="bi bi-geo-alt-fill"></i>

                                            <?= htmlspecialchars($concert["CityName"]) ?>

                                        </span>

                                    </div>

                                    <a
                                        href="?controller=concert&action=profile&id=<?= $concert["idConcert"] ?>"
                                        class="event-link">

                                        View concert

                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>

                            <?php endforeach; ?>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>