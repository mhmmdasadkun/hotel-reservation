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
                        <h4>Fasilitas Kamar</h4>
                        <div class="breadcrumb-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="<?= route_to('room.list'); ?>">Kamar</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="<?= route_to('rfacility.list'); ?>">Daftar Fasilitas</a>
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
                            <h4>Ubah Fasilitas</h4>
                        </div>
                        <form method="post" action="<?= route_to('rfacility.edit', $facility['id']); ?>" autocomplete="off">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" id="id" value="<?= $facility['id']; ?>">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="facr_name" class="form-label">Nama Fasilitas</label>
                                    <input type="text" class="form-control <?= $validation->hasError('facr_name') ? 'is-invalid' : ''; ?>" id="facr_name" name="facr_name" placeholder="Masukan nama fasilitas" value="<?= $facility['facr_name']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('facr_name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?= route_to('rfacility.list'); ?>" class="btn btn-secondary">Kembali</a>
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