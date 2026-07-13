<?php // TODO: Arranjar a validação do tamanho de dados
require __DIR__ . '/../Layout/header.php'; ?>
<?php /** @var array $users */ ?>
<?php require __DIR__ . '/../Layout/sidebar.php'; ?>

<?php require __DIR__ . '/../Layout/navbar.php';
/* var_dump($_SESSION);
die; */ ?>

<div class="main-content" id="mainContent">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="dashboard-card">

                    <div class="card-body p-5">

                        <div class="text-center mb-5">

                            <i
                                class="bi bi-star-fill"
                                style="font-size:3rem;color:var(--primary);">

                            </i>

                            <h2 class="mt-3">

                                Write a Review

                            </h2>

                            <p class="text-muted">

                                Share your experience from this concert.

                            </p>

                        </div>
                        <div class="dashboard-card p-4">
                            <h3><?= htmlspecialchars($concert["EventTitle"]) ?></h3>

                            <div class="d-flex align-items-center mt-3">

                                <img
                                    src="<?= htmlspecialchars($concert["BandProfileImage"]) ?>"
                                    class="rounded-circle me-3"
                                    style="width:80px;height:80px;object-fit:cover;">

                                <div>

                                    <h5 class="mb-1">
                                        <?= htmlspecialchars($concert["BandName"]) ?>
                                    </h5>

                                    <div class="text-muted">

                                        <i class="bi bi-mic-fill"></i>
                                        <?= htmlspecialchars($concert["Stage"]) ?>

                                        <br>

                                        <i class="bi bi-calendar-event"></i>
                                        <?= date("d/m/Y H:i", strtotime($concert["StartDateTime"])) ?>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <form
                            method="POST"
                            action="?controller=review&action=createReview"
                            enctype="multipart/form-data">

                            <input
                                type="hidden"
                                name="concert_id"
                                value="<?= htmlspecialchars($_GET["concert_id"]) ?>">

                            <input
                                type="hidden"
                                id="rating"
                                name="rating"
                                value="<?= $review ? $review["Rating"] : 0 ?>">

                            <div class="mb-4">
                                <br>
                                <label class="form-label">

                                    Rating

                                </label>

                                <div
                                    id="star-rating"
                                    class="fs-2">

                                    <?php for ($i = 1; $i <= 5; $i++): ?>

                                        <i
                                            class="bi bi-star rating-star"
                                            data-value="<?= $i ?>">

                                        </i>

                                    <?php endfor; ?>

                                </div>

                            </div>

                            <div class="mb-4">

                                <label class="form-label">

                                    Review

                                </label>

                                <textarea
                                    class="form-control"
                                    name="text"
                                    rows="8"
                                    placeholder="Tell everyone how the concert was..."><?= $review ? htmlspecialchars($review["Text"]) : "" ?></textarea>

                            </div>

                            <div class="mb-4">

                                <label class="form-label">

                                    Media

                                </label>

                                <input
                                    type="file"
                                    id="photoInput"
                                    name="photos[]"
                                    accept="image/*,video/mp4,video/webm,video/quicktime"
                                    multiple
                                    hidden>

                                <div
                                    id="existingMedia"
                                    class="d-flex flex-wrap gap-3 mt-2 mb-3">

                                    <?php foreach ($reviewMedia as $media): ?>

                                        <div class="photo-wrapper">

                                            <?php
                                            $extension = strtolower(pathinfo($media["FileLocation"], PATHINFO_EXTENSION));
                                            ?>

                                            <?php if (in_array($extension, ["mp4", "mov", "webm", "avi"])): ?>

                                                <video
                                                    src="<?= htmlspecialchars($media["FileLocation"]) ?>"
                                                    class="photo-thumb"
                                                    muted>

                                                </video>

                                            <?php else: ?>

                                                <img
                                                    src="<?= htmlspecialchars($media["FileLocation"]) ?>"
                                                    class="photo-thumb">

                                            <?php endif; ?>

                                            <button type="button" class="remove-photo existing-media" data-id="<?= $media["idMedia"] ?>">

                                                <i class="bi bi-x"></i>

                                            </button>

                                        </div>

                                    <?php endforeach; ?>

                                </div>
                                <div
                                    id="photoPreview"
                                    class="d-flex flex-wrap gap-3 mt-2">

                                </div>

                                <small class="text-muted">

                                    Maximum 5 files.

                                </small>

                            </div>
                            <div id="deletedMediaInputs"></div>

                            <div class="d-flex justify-content-end">

                                <button
                                    type="submit"
                                    class="btn btn-crowdex">

                                    <i class="bi <?= $review ? "bi-pencil-fill" : "bi-send-fill" ?>"></i>

                                    <?= $review ? "Update Review" : "Publish Review" ?>

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>
    /* ==========================
       Rating
    ========================== */

    const stars = document.querySelectorAll(".rating-star");
    const input = document.getElementById("rating");
    const text = document.getElementById("rating-text");

    let selected = <?= $review ? $review["Rating"] : 0 ?>;

    function draw(rating) {

        stars.forEach(star => {

            const value = Number(star.dataset.value);

            star.className = "bi rating-star";

            if (rating >= value) {

                star.classList.add("bi-star-fill");

            } else if (rating >= value - 0.5) {

                star.classList.add("bi-star-half");

            } else {

                star.classList.add("bi-star");

            }

        });

        if (text) {

            text.textContent = rating === 0 ?
                "Select a rating" :
                rating.toFixed(1) + " ★";

        }

    }

    stars.forEach(star => {

        star.addEventListener("mousemove", e => {

            const rect = star.getBoundingClientRect();

            const value = Number(star.dataset.value);

            const hoverRating =
                (e.clientX - rect.left) < rect.width / 2 ?
                value - 0.5 :
                value;

            draw(hoverRating);

        });

        star.addEventListener("click", e => {

            const rect = star.getBoundingClientRect();

            const value = Number(star.dataset.value);

            selected =
                (e.clientX - rect.left) < rect.width / 2 ?
                value - 0.5 :
                value;

            input.value = selected;

            draw(selected);

        });

    });

    document
        .getElementById("star-rating")
        .addEventListener("mouseleave", () => draw(selected));

    draw(selected);

    input.value = selected;

    /* ==========================
       Media Upload
    ========================== */

    const inputMedia = document.getElementById("photoInput");
    const preview = document.getElementById("photoPreview");
    const deletedMediaInputs = document.getElementById("deletedMediaInputs");
    const existingMedia = document.getElementById("existingMedia");

    let files = [];

    inputMedia.addEventListener("change", async function() {

        const incoming = [...this.files];

        for (const file of incoming) {

            if (existingCount() + files.length >= 5) {

                alert("You can upload a maximum of 5 files.");

                break;

            }

            if (file.type.startsWith("video/")) {

                const duration = await getVideoDuration(file);

                if (duration > 600) {

                    alert("Videos can be at most 10 minutes.");

                    continue;

                }

            }

            files.push(file);

        }

        updateInput();

        renderMedia();

    });

    function getVideoDuration(file) {

        return new Promise(resolve => {

            const video = document.createElement("video");

            video.preload = "metadata";

            video.src = URL.createObjectURL(file);

            video.onloadedmetadata = function() {

                resolve(video.duration);

                URL.revokeObjectURL(video.src);

            };

        });

    }

    function existingCount() {

        return existingMedia.querySelectorAll(".photo-wrapper").length;

    }

    function renderMedia() {

        preview.replaceChildren();

        files.forEach((file, index) => {

            const wrapper = document.createElement("div");

            wrapper.className = "photo-wrapper";

            let media;

            if (file.type.startsWith("image/")) {

                media = document.createElement("img");

                media.src = URL.createObjectURL(file);

            } else {

                media = document.createElement("video");

                media.src = URL.createObjectURL(file);

                media.muted = true;

                media.controls = false;

                media.loop = true;

                media.playsInline = true;

            }

            media.className = "photo-thumb";

            const remove = document.createElement("button");

            remove.type = "button";

            remove.className = "remove-photo";

            remove.innerHTML = '<i class="bi bi-x"></i>';

            remove.onclick = function() {

                files.splice(index, 1);

                updateInput();

                renderMedia();

            };

            wrapper.appendChild(media);

            wrapper.appendChild(remove);

            preview.appendChild(wrapper);

        });

        const totalMedia = existingCount() + files.length;

        if (totalMedia < 5) {

            const label = document.createElement("label");

            label.className = "photo-add";

            label.htmlFor = "photoInput";

            label.innerHTML = '<i class="bi bi-plus-lg"></i>';

            preview.appendChild(label);

        }

    }

    function updateInput() {

        const dt = new DataTransfer();

        files.forEach(file => dt.items.add(file));

        inputMedia.files = dt.files;

    }
    document.querySelectorAll(".existing-media").forEach(button => {

        button.addEventListener("click", function() {

            const wrapper = this.closest(".photo-wrapper");

            wrapper.remove();

            const input = document.createElement("input");

            input.type = "hidden";

            input.name = "deleteMedia[]";

            input.value = this.dataset.id;

            deletedMediaInputs.appendChild(input);
            renderMedia();
        });

    });
    renderMedia();
</script>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>