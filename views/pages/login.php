<?php
/**
 * @var string $title
 */
?>

<!DOCTYPE HTML>
<html lang="de" data-bs-theme="dark">
    <head>
        <title><?= "$title | Adventure Management" ?></title>
        <meta charset="UTF-8" />
        <link rel="icon" href="/path/to/favicon.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login-container container w-50 h-25 p-2">
            <h3 class="mb-5 text-center">
                <?= $title ?>
            </h3>

            <form action="<?= base_url('login') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">
                        Benutzername
                        <span class="text-danger">*</span>
                    </label>

                    <input type="text" name="username" id="username" placeholder="Benutzername" class="form-control" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Passwort
                        <span class="text-danger">*</span>
                    </label>

                    <input type="password" name="password" id="password" placeholder="Passwort" class="form-control" required />
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Anmelden
                    </button>

                    <a href="<?= base_url('register') ?>" class="text-primary text-decoration-none">
                        Kein Konto? Hier registrieren.
                    </a>
                </div>
            </form>
        </div>
    </body>
</html>