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
                                <li class="breadcrumb-item active">Daftar Fasilitas</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Fasilitas Kamar</h4>
                        </div>
                        <div class="card-body fs-15">
                            <?= $this->include('components/alerts'); ?>
                            <table class="table table-striped align-middle border-top" id="rfacilities">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1; ?>
                                    <?php foreach ($facilities as $arr) : ?>
                                        <tr>
                                            <td><?= $num++; ?></td>
                                            <td><?= $arr['facr_name']; ?></td>
                                            <td>
                                                <a href="<?= route_to('rfacility.edit', $arr['id']); ?>" class="btn btn-warning btn-sm">Ubah</a>
                                                <form method="post" action="<?= route_to('rfacility.delete', $arr['id']); ?>" autocomplete="off" class="d-inline-block">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data?');">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js'); ?>
<script>
    $('#rfacilities').DataTable({
        processing: true,
        orderable: false,
        oLanguage: {
            sLengthMenu: '<a href="<?= route_to('rfacility.add'); ?>" class="btn btn-primary fs-15">Tambah Data</a>'
        },
        "columnDefs": [{
            width: "10%",
            targets: 0,
        }],
    });
</script>
<?= $this->endSection(); ?>
<?= $this->endSection(); ?>