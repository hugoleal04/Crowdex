<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php /*require __DIR__ . '/../Layout/sidebar.php';*/ ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>
<?php /** @var array $review */ ?>

<?php
$rating = (float)$review["AverageRating"];
$fullStars = floor($rating);
$halfStar = ($rating - $fullStars) >= 0.5;
?>

<div class="main-content" id="mainContent">
    <div class="container py-5">
        <!-- HERO -->
        <div class="dashboard-card overflow-hidden p-0 mb-5">
            <div class="position-relative">
                <img
                    src="<?= htmlspecialchars($review["BandCoverImage"]) ?>"
                    class="w-100"
                    style="height:320px; object-fit:cover;"
                    alt="Band Cover">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to top, rgba(0,0,0,.75), rgba(0,0,0,.15));"></div>
                <div class="position-absolute bottom-0 start-0 w-100 p-4">
                    <div class="d-flex align-items-end">
                        <img
                            src="<?= htmlspecialchars($review["BandProfileImage"]) ?>"
                            class="rounded-circle border border-4 border-white me-4"
                            style="width:130px; height:130px; object-fit:cover;"
                            alt="Band Profile">
                        <div class="text-white flex-grow-1">
                            <h1 class="fw-bold mb-2"><?= htmlspecialchars($review["BandName"]) ?></h1>
                            <div class="mb-2">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <?php if ($i <= $fullStars): ?>
                                        <i class="bi bi-star-fill text-warning"></i>
                                    <?php elseif ($halfStar): ?>
                                        <i class="bi bi-star-half text-warning"></i>
                                        <?php $halfStar = false; ?>
                                    <?php else: ?>
                                        <i class="bi bi-star text-warning"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <span class="ms-2 fw-semibold"><?= number_format($rating, 1) ?></span>
                                <span class="text-light">(<?= $review["ReviewCount"] ?> Reviews)</span>
                            </div>
                            <div class="small">
                                <i class="bi bi-calendar-event"></i>
                                <?= date("d M Y", strtotime($review["StartDateTime"])) ?>
                                &nbsp;&nbsp;
                                <i class="bi bi-geo-alt-fill"></i>
                                <?= htmlspecialchars($review["CityName"]) ?> • <?= htmlspecialchars($review["CountryName"]) ?>
                            </div>
                        </div>
                        <div>
                            <a href="?controller=concert&action=profile&id=<?= $review["idConcert"] ?>" class="btn btn-crowdex">
                                <i class="bi bi-music-note-list"></i> View Concert
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- REVIEW -->
        <div class="dashboard-card mb-5">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <a href="?controller=user&action=profile&id=<?= $review["idUser"] ?>">
                        <img
                            src="<?= htmlspecialchars($review["PFP"]) ?>"
                            class="rounded-circle me-3"
                            style="width:75px; height:75px; object-fit:cover;"
                            alt="User Profile">
                    </a>
                    <div class="flex-grow-1">
                        <a href="?controller=user&action=profile&id=<?= $review["idUser"] ?>" class="text-decoration-none text-dark fw-bold fs-4">
                            <?= htmlspecialchars($review["Username"]) ?>
                        </a>
                        <div class="text-muted small">Reviewed on <?= date("d M Y", strtotime($review["CreatedAt"])) ?></div>
                    </div>
                </div>
                <div class="mb-4">
                    <?php
                    $rating = (float)$review["Rating"];
                    $full = floor($rating);
                    $half = ($rating - $full) >= 0.5;
                    for ($i = 1; $i <= 5; $i++):
                    ?>
                        <?php if ($i <= $full): ?>
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                        <?php elseif ($half): ?>
                            <i class="bi bi-star-half text-warning fs-4"></i>
                            <?php $half = false; ?>
                        <?php else: ?>
                            <i class="bi bi-star fs-4 text-warning"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <span class="ms-2 fs-5 fw-semibold"><?= number_format($review["Rating"], 1) ?></span>
                </div>
                <div class="review-content"><?= nl2br(htmlspecialchars($review["Text"])) ?></div>
                <hr class="my-4">
                <div
                    id="likeButton"
                    class="d-inline-flex align-items-center gap-2"
                    data-review="<?= $review['idReview'] ?>"
                    style="cursor:pointer;">
                    <i
                        id="likeIcon"
                        class="bi <?= $review['LikedByUser'] ? 'bi-hand-thumbs-up-fill text-primary' : 'bi-hand-thumbs-up' ?>"></i>

                    <span id="likeCount"><?= (int)$review['Likes'] ?></span>
                    Likes
                </div>
            </div>
        </div>

        <!-- MEDIA -->
        <?php if (!empty($media)): ?>
            <div class="dashboard-card mb-5">
                <div class="card-body">
                    <h4 class="mb-4"><i class="bi bi-images"></i> Media</h4>
                    <div class="masonry-gallery">
                        <?php foreach ($media as $item): ?>
                            <?php
                            $extension = strtolower(pathinfo($item["FileLocation"], PATHINFO_EXTENSION));
                            $isVideo = in_array($extension, ["mp4", "webm", "mov", "ogg"]);
                            ?>
                            <div class="masonry-item">
                                <?php if ($isVideo): ?>
                                    <div class="gallery-video" data-type="video" data-src="<?= htmlspecialchars($item["FileLocation"]) ?>">
                                        <video src="<?= htmlspecialchars($item["FileLocation"]) ?>" class="gallery-video-player" muted preload="metadata" playsinline></video>
                                        <div class="gallery-overlay"><i class="bi bi-play-circle-fill"></i></div>
                                    </div>
                                <?php else: ?>
                                    <img src="<?= htmlspecialchars($item["FileLocation"]) ?>" class="gallery-image" data-type="image" data-src="<?= htmlspecialchars($item["FileLocation"]) ?>" alt="Media">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- MODAL (fora do container) -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark border-0">
            <button class="btn-close btn-close-white position-absolute" style="top:25px;right:25px;z-index:1000;" data-bs-dismiss="modal"></button>
            <div id="galleryModalBody" class="modal-body d-flex justify-content-center align-items-center"></div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = new bootstrap.Modal(document.getElementById("galleryModal"));
        const body = document.getElementById("galleryModalBody");

        document.querySelectorAll(".gallery-image, .gallery-video").forEach(item => {
            item.addEventListener("click", () => {
                body.innerHTML = "";
                if (item.dataset.type === "image") {
                    const img = document.createElement("img");
                    img.src = item.dataset.src;
                    img.style.maxWidth = "95%";
                    img.style.maxHeight = "95vh";
                    img.style.objectFit = "contain";
                    body.appendChild(img);
                } else {
                    const video = document.createElement("video");
                    video.src = item.dataset.src;
                    video.controls = true;
                    video.autoplay = true;
                    video.style.maxWidth = "95%";
                    video.style.maxHeight = "95vh";
                    body.appendChild(video);
                }
                modal.show();
            });
        });
        const likeButton = document.getElementById('likeButton');

        if (likeButton) {
            likeButton.addEventListener('click', async () => {
                const response = await fetch(
                    '?controller=review&action=toggleLike', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `idReview=${likeButton.dataset.review}`
                    }
                );

                const data = await response.json();
                const likeCount = document.getElementById('likeCount');
                const icon = document.getElementById('likeIcon');

                likeCount.textContent = data.likes;
                icon.className = data.liked ?
                    'bi bi-hand-thumbs-up-fill text-primary' :
                    'bi bi-hand-thumbs-up';
            });
        }
    });
</script>