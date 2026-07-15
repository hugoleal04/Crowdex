<?php require __DIR__ . '/../Layout/header.php'; ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>
<?php require __DIR__ . '/../Layout/navbar.php'; ?>

<?php /** @var array $concert */ ?>
<?php /** @var array $gallery */ ?>
<?php /** @var array $otherConcerts */ ?>
<?php /** @var array $reviews */ ?>

<?php
$rating = (float)$concert['AverageRating'];
$fullStars = floor($rating);
$halfStar = ($rating - $fullStars) >= 0.5;
?>

<div class="main-content" id="mainContent">
    <div class="container py-5">
        <!-- HERO -->
        <div class="dashboard-card overflow-hidden p-0 mb-5">
            <div class="position-relative">
                <img
                    src="<?= htmlspecialchars($concert['BandCoverImage']) ?>"
                    class="w-100"
                    style="height:320px; object-fit:cover;"
                    alt="Band Cover">

                <div
                    class="position-absolute top-0 start-0 w-100 h-100"
                    style="background: linear-gradient(to top, rgba(0,0,0,.75), rgba(0,0,0,.15));"></div>

                <div class="position-absolute bottom-0 start-0 w-100 p-4">
                    <div class="d-flex align-items-end">
                        <img
                            src="<?= htmlspecialchars($concert['BandProfileImage']) ?>"
                            class="rounded-circle border border-4 border-white me-4"
                            style="width:130px; height:130px; object-fit:cover;"
                            alt="Band Profile">

                        <div class="text-white flex-grow-1">
                            <h1 class="fw-bold mb-2"><?= htmlspecialchars($concert['BandName']) ?></h1>

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
                                <span class="text-light">(<?= $concert['ReviewCount'] ?> Reviews)</span>
                            </div>

                            <div class="small">
                                <i class="bi bi-geo-alt-fill"></i>
                                <?= htmlspecialchars($concert['CityName']) ?>
                                • <?= htmlspecialchars($concert['CountryName']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN -->
        <div class="row g-4">
            <div class="col-lg-8">
                <!-- CONCERT INFO -->
                <div class="dashboard-card mb-4">
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <i class="bi bi-calendar-event" style="font-size:2rem;color:var(--primary);"></i>
                                <h6 class="mt-3">Date</h6>
                                <p><?= date('d M Y', strtotime($concert['StartDateTime'])) ?></p>
                            </div>

                            <div class="col-md-4">
                                <i class="bi bi-clock-fill" style="font-size:2rem;color:var(--primary);"></i>
                                <h6 class="mt-3">Time</h6>
                                <p><?= date('H:i', strtotime($concert['StartDateTime'])) ?></p>
                            </div>

                            <div class="col-md-4">
                                <i class="bi bi-mic-fill" style="font-size:2rem;color:var(--primary);"></i>
                                <h6 class="mt-3">Stage</h6>
                                <p><?= htmlspecialchars($concert['Stage']) ?></p>
                            </div>
                        </div>

                        <hr>

                        <?php if (strtotime($concert['StartDateTime']) < time()): ?>
                            <a href="?controller=review&action=create&concert_id=<?= $concert['idConcert'] ?>" class="btn btn-crowdex">
                                <i class="bi bi-pencil-fill"></i> Write Review
                            </a>
                        <?php else: ?>
                            <button class="btn btn-secondary" disabled>Concert hasn't happened yet</button>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ABOUT -->
                <div class="dashboard-card mb-4">
                    <div class="card-body">
                        <h3 class="mb-4">About</h3>
                        <p class="mb-0"><?= nl2br(htmlspecialchars($concert['EventDescription'])) ?></p>
                    </div>
                </div>

                <!-- GALLERY -->
                <div class="dashboard-card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3><i class="bi bi-images"></i> Concert Gallery</h3>
                            <span class="badge bg-secondary"><?= count($gallery) ?> Media</span>
                        </div>

                        <?php if (empty($gallery)): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-image" style="font-size:4rem; color:#bcbcbc;"></i>
                                <h5 class="mt-3">No media yet</h5>
                                <p class="text-muted mb-0">Be the first person to upload photos or videos from this concert.</p>
                            </div>
                        <?php else: ?>
                            <div class="masonry-gallery">
                                <?php foreach ($gallery as $media): ?>
                                    <?php
                                    $extension = strtolower(pathinfo($media['FileLocation'], PATHINFO_EXTENSION));
                                    $isVideo = in_array($extension, ['mp4', 'mov', 'webm', 'ogg']);
                                    ?>

                                    <div class="masonry-item">
                                        <?php if ($isVideo): ?>
                                            <div class="gallery-video">
                                                <video
                                                    src="<?= htmlspecialchars($media['FileLocation']) ?>"
                                                    class="gallery-video-player"
                                                    muted
                                                    preload="metadata"
                                                    playsinline
                                                    disablepictureinpicture
                                                    data-type="video"
                                                    data-src="<?= htmlspecialchars($media['FileLocation']) ?>"></video>
                                                <div class="gallery-overlay">
                                                    <i class="bi bi-play-circle-fill"></i>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <img
                                                src="<?= htmlspecialchars($media['FileLocation']) ?>"
                                                class="gallery-image"
                                                data-type="image"
                                                data-src="<?= htmlspecialchars($media['FileLocation']) ?>"
                                                alt="Gallery Image">
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- REVIEWS -->
                <div class="dashboard-card">
                    <div class="card-body">
                        <?php if (empty($reviews)): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-chat-square" style="font-size:4rem; color:#bdbdbd;"></i>
                                <h5 class="mt-3">No reviews yet</h5>
                                <p class="text-muted">Be the first one to review this concert.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($reviews as $review): ?>
                                <div class="clickable-review mb-4" data-url="?controller=review&action=view&id=<?= $review['idReview'] ?>">
                                    <div class="d-flex">
                                        <a href="?controller=user&action=profile&id=<?= $review['idUser'] ?>">
                                            <img
                                                src="<?= htmlspecialchars($review['PFP']) ?>"
                                                class="rounded-circle me-3"
                                                style="width:65px; height:65px; object-fit:cover;"
                                                alt="User Profile">
                                        </a>

                                        <div class="flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div>
                                                    <a href="?controller=user&action=profile&id=<?= $review['idUser'] ?>" class="text-decoration-none fw-bold">
                                                        <?= htmlspecialchars($review['Username']) ?>
                                                    </a>

                                                    <div>
                                                        <?php
                                                        $rating = (float)$review['Rating'];
                                                        $full = floor($rating);
                                                        $half = ($rating - $full) >= 0.5;

                                                        for ($i = 1; $i <= 5; $i++):
                                                        ?>
                                                            <?php if ($i <= $full): ?>
                                                                <i class="bi bi-star-fill text-warning"></i>
                                                            <?php elseif ($half): ?>
                                                                <i class="bi bi-star-half text-warning"></i>
                                                                <?php $half = false; ?>
                                                            <?php else: ?>
                                                                <i class="bi bi-star text-warning"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                </div>

                                                <small class="text-muted"><?= date('d M Y', strtotime($review['CreatedAt'])) ?></small>
                                            </div>

                                            <p class="mb-0"><?= nl2br(htmlspecialchars($review['Text'])) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4">
                <div class="dashboard-card concert-sidebar">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0"><i class="bi bi-music-note-list"></i> More from this Event</h4>
                            <span class="badge bg-secondary"><?= count($otherConcerts) ?></span>
                        </div>

                        <?php if (empty($otherConcerts)): ?>
                            <p class="text-muted mb-0">No other concerts.</p>
                        <?php else: ?>
                            <?php foreach ($otherConcerts as $other): ?>
                                <?php
                                $rating = (float)$other['AverageRating'];
                                $full = floor($rating);
                                $half = ($rating - $full) >= 0.5;
                                ?>

                                <a href="?controller=concert&action=profile&id=<?= $other['idConcert'] ?>" class="other-concert">
                                    <img
                                        src="<?= htmlspecialchars($other['BandProfileImage']) ?>"
                                        class="other-concert-image"
                                        alt="Band Profile">

                                    <div class="other-concert-info">
                                        <h6><?= htmlspecialchars($other['BandName']) ?></h6>

                                        <small>
                                            <i class="bi bi-clock"></i>
                                            <?= date('H:i', strtotime($other['StartDateTime'])) ?>
                                            • <?= htmlspecialchars($other['Stage']) ?>
                                        </small>

                                        <div class="mt-1">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <?php if ($i <= $full): ?>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                <?php elseif ($half): ?>
                                                    <i class="bi bi-star-half text-warning"></i>
                                                    <?php $half = false; ?>
                                                <?php else: ?>
                                                    <i class="bi bi-star text-warning"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>

                                            <span class="small text-muted">
                                                <?= number_format($rating, 1) ?>
                                                (<?= $other['ReviewCount'] ?>)
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- GALLERY MODAL -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark border-0">
            <button
                class="btn-close btn-close-white position-absolute"
                style="top:25px;right:25px;z-index:10;"
                data-bs-dismiss="modal"></button>

            <div class="modal-body d-flex justify-content-center align-items-center" id="galleryModalBody"></div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gallery Modal
        const galleryModal = new bootstrap.Modal(document.getElementById('galleryModal'));
        const galleryBody = document.getElementById('galleryModalBody');

        document.querySelectorAll('.gallery-image, .gallery-video-player').forEach(item => {
            item.addEventListener('click', function() {
                galleryBody.innerHTML = '';

                if (this.dataset.type === 'image') {
                    const img = document.createElement('img');
                    img.src = this.dataset.src;
                    img.style.maxWidth = '95%';
                    img.style.maxHeight = '95vh';
                    img.style.objectFit = 'contain';
                    galleryBody.appendChild(img);
                } else {
                    const video = document.createElement('video');
                    video.src = this.dataset.src;
                    video.controls = true;
                    video.autoplay = true;
                    video.style.maxWidth = '95%';
                    video.style.maxHeight = '95vh';
                    galleryBody.appendChild(video);
                }

                galleryModal.show();
            });
        });

        // Clickable Reviews
        document.querySelectorAll('.clickable-review').forEach(card => {
            card.addEventListener('click', function(e) {
                if (e.target.closest('a')) {
                    return;
                }
                window.location = this.dataset.url;
            });
        });
    });
</script>