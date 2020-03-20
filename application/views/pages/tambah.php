<div class="container mt-5">
    <h2 class="text-center"><?= $title; ?></h2>
    <form action="" method="post" class="col-md-8 offset-md-2">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul"
                value="<?= set_value('judul'); ?>">
            <small class="form-text text-primary text-right"><?= form_error('judul'); ?></small>
        </div>
        <div class="form-group">
            <label for="ckeditor">Teks</label>
            <textarea name="teks" id="ckeditor" cols="30" rows="10" class="form-control ckeditor"
                placeholder="Masukan Teks"><?= set_value('teks'); ?></textarea>
            <small class="form-text text-primary text-right"><?= form_error('teks'); ?></small>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder=" ex:   javascript">
            <small class="form-text text-muted">jika kosong akan di masukan ke kategori All</small>
            <small class="form-text text-primary text-right"><?= form_error('kategori'); ?></small>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Buat Catatan</button>
    </form>
</div>