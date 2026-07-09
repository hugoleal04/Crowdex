<?php // TODO: Arranjar a validação do tamanho de dados
 require __DIR__ . '/../Layout/header.php'; ?>

<?php require __DIR__ . '/../Layout/sidebar.php'; ?>

<?php require __DIR__ . '/../Layout/navbar.php'; ?>

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

                        <form
                            method="POST"
                            action="?controller=review&action=createReview">

                            <input
                                type="hidden"
                                name="concert_id"
                                value="<?= htmlspecialchars($_GET["id"]) ?>">

                            <input
                                type="hidden"
                                id="rating"
                                name="rating"
                                value="0">

                            <div class="mb-4">

                                <label class="form-label">

                                    Rating

                                </label>

                                <div
                                    id="star-rating"
                                    class="fs-2">

                                    <?php for($i = 1; $i <= 5; $i++): ?>

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
                                    placeholder="Tell everyone how the concert was..."></textarea>

                            </div>

                            <div class="d-flex justify-content-end">

                                <button
                                    type="submit"
                                    class="btn btn-crowdex">

                                    <i class="bi bi-send-fill"></i>

                                    Publish Review

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

const stars = document.querySelectorAll(".rating-star");

const input = document.getElementById("rating");

const text = document.getElementById("rating-text");

let selected = 0;

function draw(rating){

    stars.forEach(star=>{

        const value = Number(star.dataset.value);

        star.className = "bi rating-star";

        if(rating >= value){

            star.classList.add("bi-star-fill");

        }else if(rating >= value - 0.5){

            star.classList.add("bi-star-half");

        }else{

            star.classList.add("bi-star");

        }

    });

    if(rating === 0){

        text.textContent = "Select a rating";

    }else{

        text.textContent = rating.toFixed(1) + " ★";

    }

}

stars.forEach(star=>{

    star.addEventListener("mousemove", e=>{

        const rect = star.getBoundingClientRect();

        const x = e.clientX - rect.left;

        const value = Number(star.dataset.value);

        const hoverRating = x < rect.width/2
            ? value - 0.5
            : value;

        draw(hoverRating);

    });

    star.addEventListener("click", e=>{

        const rect = star.getBoundingClientRect();

        const x = e.clientX - rect.left;

        const value = Number(star.dataset.value);

        selected = x < rect.width/2
            ? value - 0.5
            : value;

        input.value = selected;

        draw(selected);

    });

});

document.getElementById("star-rating").addEventListener("mouseleave", ()=>{

    draw(selected);

});

</script>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>