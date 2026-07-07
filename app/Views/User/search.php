<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Crowdex</title>

</head>
<?php /** @var array $users */ ?>
<?php /** @var array $bands */ ?>
<?php /** @var array $events */ ?>


<body>

    <?php require __DIR__ . '/../Layout/header.php'; ?>

    <?php require __DIR__ . '/../Layout/sidebar.php'; ?>

    <?php require __DIR__ . '/../Layout/navbar.php'; ?>

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

    <?php require __DIR__ . '/../Layout/scripts.php'; ?>

</body>

</html>