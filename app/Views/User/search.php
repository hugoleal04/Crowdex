<?php

/** @var array $users */ ?>
<?php /** @var array $bands */ ?>
<?php /** @var array $events */ ?>

<?php require __DIR__ . '/../Layout/header.php'; ?>

<?php require __DIR__ . '/../Layout/sidebar.php'; ?>

<?php require __DIR__ . '/../Layout/navbar.php'; ?>

<!-- DASHBOARD -->
<!-- <?php /* var_dump($_GET);
die(); */ ?> -->
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
                    <a
                        href="?controller=user&action=profile&id=<?= $user["idUser"] ?>"
                        class="text-decoration-none text-dark">
                        <div class="result-card">
                            <img
                                src="<?= $user["PFP"] ?>"
                                class="result-avatar"
                                alt="Profile">
                            <h6><?= $user["Name"] ?></h6>
                            <small>@<?= $user["Username"] ?></small>
                            <?php if ($user["idUser"] != $_SESSION["user_id"]): ?>
                                <form method="POST" action="?controller=user&action=followUnfollow">
                                    <input type="hidden" name="redirect" value="search">
                                    <input type="hidden" name="query" value="<?= htmlspecialchars($_GET["query"] ?? "") ?>">
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
                                        class="btn <?= $user["Following"] ? "btn-outline-secondary" : "btn-crowdex" ?> btn-sm w-100 mt-3">

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
                        </div>
                    </a>
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
                <?php if (empty($bands) && !empty($lastFmBands)): ?>

                    <?php foreach ($lastFmBands as $artist): ?>

                        <div class="result-card">

                            <img
                                src="<?= !empty($artist["image"][3]["#text"])
                                            ? htmlspecialchars($artist["image"][3]["#text"])
                                            : "media/default_band.webp" ?>"
                                class="result-avatar">

                            <h6>

                                <?= htmlspecialchars($artist["name"]) ?>

                            </h6>

                            <small>

                                Last.fm Artist

                            </small>

                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
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

<?php require __DIR__ . '/../Layout/scripts.php'; ?>