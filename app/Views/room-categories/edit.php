<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content -->
<div class="content-wrapper">
    <div class="content-main">
        <div class="container-fluid">
            <!-- Breadcrumb -->
            <div class="row">
                <div class="col-12">
                    <div class="content-title-breadcrumb d-sm-flex align-items-center justify-content-between">
                        <h4>Kategori Kamar</h4>
                        <div class="breadcrumb-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="<?= route_to('room.list'); ?>">Kamar</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= route_to('rcategory.list'); ?>">Daftar Kategori</a>
                                </li>
                                <li class="breadcrumb-item active">Ubah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Ubah Kategori</h4>
                        </div>
                        <form method="post" action="<?= route_to('rcategory.edit', $category['id']); ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" id="id" value="<?= $category['id']; ?>">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="catr_name" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control <?= $validation->hasError('catr_name') ? 'is-invalid' : ''; ?>" id="catr_name" name="catr_name" placeholder="Masukan nama kategori" value="<?= $category['catr_name']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('catr_name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?= route_to('rcategory.list'); ?>" class="btn btn-secondary">Kembali</a>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>