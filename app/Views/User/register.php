<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Registar - Crowdex</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<?php /** @var array $countries */ ?>

<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">
                        Criar Conta
                    </h2>
                    <form method="POST" action="?controller=user&action=createUser">
                        <div class="mb-3">
                            <label class="form-label">
                                Nome
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Password
                            </label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Confirmar Password
                            </label>
                            <input
                                type="password"
                                name="confirmPassword"
                                class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">
                                Data de Nascimento
                            </label>
                            <input
                                type="date"
                                name="birthday"
                                class="form-control"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">
                                País
                            </label>
                            <?php
                                function countryFlag(string $iso2): string
                                {
                                    $iso2 = strtoupper($iso2);

                                    return mb_chr(ord($iso2[0]) + 127397)
                                        . mb_chr(ord($iso2[1]) + 127397);
                                }
                            ?>
                            <select
                                name="country"
                                class="form-select"
                                required>

                                <option value="">
                                    Selecionar país
                                </option>

                                <?php foreach ($countries as $country): ?>

                                    <option value="<?= $country["idCountry"] ?>">
                                        <?= countryFlag($country["ISO2"]) ?>
                                        <?= htmlspecialchars($country["Name"]) ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-success w-100">
                            Criar Conta
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        Já tens conta?
                        <a href="?controller=auth&action=login">
                            Iniciar Sessão
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>