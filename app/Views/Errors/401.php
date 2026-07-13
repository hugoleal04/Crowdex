<?php require __DIR__ . '/../Layout/header.php'; ?>

<div class="main-content" id="mainContent">

    <div class="container py-5">

        <div class="dashboard-card text-center p-5">

            <i class="bi bi-ticket-perforated-fill"
               style="font-size:5rem;color:var(--primary);"></i>

            <h1 class="display-2 fw-bold mt-3">401</h1>

            <h3 class="mb-3">
                You're not on the guest list.
            </h3>

            <p class="text-muted mb-4">
                Please sign in before accessing this page.
            </p>

            <a href="?controller=user&action=login" class="btn btn-crowdex">
                <i class="bi bi-box-arrow-in-right"></i>
                Sign In
            </a>

        </div>

    </div>

</div>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>