<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>
<?php /** @var array $reviews */ ?>

<div class="main-content" id="mainContent">

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

                <h4>Recent Reviews</h4>
            </div>

            <div class="reviews-carousel">

                <?php foreach ($reviews as $review): ?>

                    <div class="dashboard-card review-card">


                        <div class="d-flex align-items-center mb-3">

                            <img
                                src="<?= htmlspecialchars($review["PFP"]) ?>"
                                class="rounded-circle me-2"
                                style="width:48px;height:48px;object-fit:cover;">

                            <div>

                                <strong>
                                    <?= htmlspecialchars($review["Username"]) ?>
                                </strong>

                                <br>

                                <small class="text-muted">
                                    <?= date("d M Y", strtotime($review["CreatedAt"])) ?>
                                </small>

                            </div>

                        </div>

                        <div class="d-flex align-items-center mb-2 review-concert">

                            <img
                                src="<?= htmlspecialchars($review["BandProfileImage"]) ?>"
                                class="rounded-circle me-2"
                                style="width:32px;height:32px;object-fit:cover;">

                            <div>

                                <strong>
                                    <?= htmlspecialchars($review["BandName"]) ?>
                                </strong>

                                <br>

                                <small class="text-muted review-event">
                                    <?= htmlspecialchars($review["EventTitle"]) ?>
                                </small>

                            </div>

                        </div>

                        <div class="mb-2">

                            <?php
                            for ($i = 1; $i <= 5; $i++) {

                                if ($review["Rating"] >= $i) {

                                    echo '<i class="bi bi-star-fill"></i>';
                                } elseif ($review["Rating"] >= $i - 0.5) {

                                    echo '<i class="bi bi-star-half"></i>';
                                } else {

                                    echo '<i class="bi bi-star"></i>';
                                }
                            }
                            ?>

                        </div>

                        <p class="review-text small text-muted">
                            <?= htmlspecialchars($review["Text"]) ?>
                        </p>

                    </div>

                <?php endforeach; ?>

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

<?php require __DIR__ . '/../Layout/scripts.php'; ?>