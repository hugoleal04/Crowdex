<!DOCTYPE html>
<html>

<head>
    <title>
        Login
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/layout.css">
</head>

<body class="auth-page">
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow p-4">
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">
                        Invalid email or password.
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['register'])): ?>
                    <div class="alert alert-success">
                        Account created successfully.
                    </div>
                <?php endif; ?>
                <form method="POST" action="?controller=user&action=loginConf">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">
                            We'll never share your email with anyone else.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="mb-3 form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="remember"
                            name="remember">

                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-crowdex w-100">
                        Log in
                    </button>
                    <a
                        href="?controller=user&action=register"
                        class="btn btn-outline-crowdex w-100">

                        Don't have an account? Create one

                    </a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>