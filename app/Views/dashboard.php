<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<!-- Content -->
<div class="content-wrapper">
    <div class="content-main">
        <div class="content-container">
            <h3><?= $session->username; ?></h3>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>