<?php require __DIR__ . '/../Layout/header.php'; ?>

<?php require __DIR__ . '/../Layout/sidebar.php'; ?>

<?php require __DIR__ . '/../Layout/navbar.php'; ?>

<div class="main-content" id="mainContent">

    <div class="container py-5">

        <h2 class="mb-5">

            <i class="bi bi-gear-fill"></i>

            Settings

        </h2>

        <form
            method="POST"
            action="?controller=user&action=updateSettings"
            enctype="multipart/form-data">

            <div class="settings-container">

                <!-- LEFT -->

                <div class="profile-column">

                    <div class="profile-picture-wrapper">

                        <img
                            src="<?= htmlspecialchars($_SESSION["pfp"]) ?>"
                            class="settings-pfp"
                            alt="<?= htmlspecialchars($_SESSION["name"]) ?>">

                        <label
                            for="pfp"
                            class="edit-overlay">

                            <i class="bi bi-camera-fill"></i>

                            Change photo

                        </label>

                        <input
                            type="file"
                            id="pfp"
                            name="pfp"
                            accept="image/*"
                            hidden>

                    </div>

                    <h4 class="mt-4 text-center">

                        <?= htmlspecialchars($_SESSION["name"]) ?>

                    </h4>

                    <p class="text-center text-muted">

                        @<?= htmlspecialchars($_SESSION["username"]) ?>

                    </p>

                </div>

                <!-- RIGHT -->

                <div class="settings-form">

                    <div class="card shadow-sm border-0">

                        <div class="card-body p-4">

                            <h4 class="mb-4">

                                Profile Information

                            </h4>

                            <div class="mb-3">

                                <label class="form-label">

                                    Name

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="<?= htmlspecialchars($_SESSION["name"]) ?>">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Username

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    value="<?= htmlspecialchars($_SESSION["username"]) ?>">

                            </div>

                            <div class="mb-4">

                                <label class="form-label">

                                    Email

                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="<?= htmlspecialchars($_SESSION["email"]) ?>">

                            </div>

                            <hr class="my-4">

                            <h5 class="mb-3">

                                Security

                            </h5>

                            <div class="mb-3">

                                <label class="form-label">

                                    New password

                                </label>

                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="Leave empty to keep current password">

                            </div>

                            <div class="mb-4">

                                <label class="form-label">

                                    Confirm password

                                </label>

                                <input
                                    type="password"
                                    class="form-control"
                                    name="confirmPassword">

                            </div>

                            <div class="d-flex justify-content-end">

                                <button
                                    type="submit"
                                    class="btn btn-crowdex">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Save changes

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

<script>
    const input = document.getElementById("pfp");

    const image = document.querySelector(".settings-pfp");

    input.addEventListener("change", e => {

        if (e.target.files.length) {

            image.src = URL.createObjectURL(e.target.files[0]);

        }

    });
</script>

<?php require __DIR__ . '/../Layout/scripts.php'; ?>