<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootswatch-superhero.min.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>"> -->
    <!-- my style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/mystyle.css'); ?>">

    <title>Log in</title>
</head>

<body id="body" class="position-relative">

    <!-- particle js container -->
    <div id="particles-js"></div>

    <div class="container">
        <div class="row align-items-center" style="min-height: 500px">
            <div class="col-md-4 offset-md-4 mt-5">
                <div class="card px-3 px-md-4 py-5">

                    <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-warning" role="alert">
                        <small class="text-center"> <?= $this->session->flashdata('error'); ?></small>
                    </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama"
                                value="<?= set_value('nama'); ?>">
                            <?php if (form_error('nama')) : ?>
                            <small class="text-warning font-italic"> <?= form_error('nama'); ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Paswword" value="<?= set_value('password'); ?>">
                            <?php if (form_error('password')) : ?>
                            <small class="text-warning font-italic"> <?= form_error('password'); ?></small>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">Login</button>
                        <small class="form-text text-left"><a class="text-warning"
                                href="<?= base_url(); ?>">&lt--kembali</a></small>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>


    <!-- particle js -->
    <script src="<?= base_url() ?>assets/js/particles.js"></script>

    <script>
    // particle js
    particlesJS.load('particles-js', "<?= base_url() ?>assets/js/particlesjs-config.json", function() {
        console.log('callback - particles.js config loaded');
    });
    </script>

    <script src="<?= base_url('assets/js/myscript.js'); ?>"></script>
</body>

</html>