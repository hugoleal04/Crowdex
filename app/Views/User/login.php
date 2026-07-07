<!DOCTYPE html>
<html>
    <head>
        <title>
            Login
        </title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
    </head>
    <body>
        <!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow p-4">
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
                            name="remember"
                        >

                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    </body>
</html>