<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <base href="<?= 'http://localhost/phpmyadmin/index.php?route=/database/structure&db=cine' ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de peliculas</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Info Pelis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="">peliculas</a>
                        </li>
                        <?php if (!isset($_SESSION['USER_ID'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="login">Login</a>
                            <?php require_once 'login.php' ?>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="logout">Logout (<?= $_SESSION['USER_EMAIL'] ?>)</a>
                        </li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
            </nav>
    </header>
