<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootswatch-superhero.min.css'); ?>">

    <!-- material icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">

    <title>My Notebook</title>
</head>

<body id="body" class="position-relative">


    <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3 px-md-4 py-2 py-md-3">
        <a class="navbar-brand" href="<?= base_url('home/homepage'); ?>">Notebook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <?php if ($this->session->userdata('isAdmin')) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('catatan-baru'); ?>">Buat catatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('logout'); ?>">Log out</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('login'); ?>">Log in</a>
                </li>
                <?php endif; ?>
            </ul>
            <form class="d-none d-md-flex form-inline my-2 my-lg-0" action="<?= base_url('home/index') ?>"
                method="POST">
                <input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Judul" name="cari"
                    value="<?= $this->session->userdata('keyword'); ?>">
                <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>