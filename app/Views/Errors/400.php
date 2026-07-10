<?php require __DIR__ . '/../Layout/header.php'; ?>

<div class="main-content" id="mainContent">

    <div class="container py-5">

        <div class="dashboard-card text-center p-5">

            <i class="bi bi-ticket-detailed-fill"
               style="font-size:5rem;color:var(--primary);"></i>

            <h1 class="display-2 fw-bold mt-3">400</h1>

            <h3 class="mb-3">
                That ticket doesn't look right.
            </h3>

            <p class="text-muted mb-4">
                Your request couldn't be processed because it was invalid.
            </p>

            <a href="?controller=user&action=menu" class="btn btn-crowdex">
                <i class="bi bi-house-door-fill"></i>
                Back to Home
            </a>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>