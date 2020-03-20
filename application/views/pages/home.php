<div class="container mt-3 mt-md-5" id="content">

    <!-- particle js container -->
    <!-- <div id="particles-js"></div> -->

    <!-- form cari -->
    <form class="d-md-none my-4" action="<?= base_url(); ?>" method="POST">

        <div class="form-row">
            <div class="col-9">
                <input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Judul" name="cari"
                    value="<?= $this->session->userdata('keyword'); ?>">
            </div>
            <div class="col-3">
                <button class="btn btn-primary btn-block btn-sm" type="submit">Search</button>
            </div>
        </div>

    </form>


    <div class="pagination">
        <?= $this->pagination->create_links(); ?>
    </div>


    <div class="row">
        <div class="col-12 col-md-7">
            <?php foreach ($datas as $data) : ?>
            <div class="card mb-1">
                <div class="card-header">
                    <?= $data['judul']; ?>
                </div>
                <div class="card-body d-none">
                    <?= $data['teks']; ?>
                    <br>
                    <p class="text-italic text-primary text-right">#<?= $data['kategori']; ?></p>
                    <?php if ($this->session->userdata('isAdmin')) : ?>
                    <a class="badge badge-success p-2" href="<?= base_url(); ?>edit/<?= $data['id']; ?>">edit</a>
                    <a class="badge badge-danger p-2" href="<?= base_url(); ?>home/hapus/<?= $data['id']; ?>">delete</a>
                    <?php endif; ?>


                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="d-none d-md-block col-md-3 offset-md-2">
            <h4>Kategori</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?= base_url('home/homepage'); ?>">#All</a>
                </li>
                <?php foreach ($kategori as $kat) : ?>
                <?php if ($kat['kategori'] !== 'all') : ?>
                <li class="list-group-item">
                    <a href="<?= base_url(); ?>kategori/<?= $kat['kategori']; ?> ">
                        <!-- replace dash with space -->
                        #<?= str_replace('-', ' ', $kat['kategori']); ?>
                    </a>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>



        <!-- kategori dalam mobile view -->
        <div class="d-block d-md-none col  mt-5">
            <h4>Kategori</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb .arr-right" id="breadcumb">

                    <li class="breadcrumb-item">
                        <a href="<?= base_url('home/homepage'); ?>">#All</a>
                    </li>
                    <?php foreach ($kategori as $kat) : ?>
                    <?php if ($kat['kategori'] !== 'all') : ?>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>kategori/<?= $kat['kategori']; ?> ">
                            <!-- replace dash with space -->
                            #<?= str_replace('-', ' ', $kat['kategori']); ?>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </nav>
        </div>



    </div>
    <!-- tutup row -->


</div>