<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Reservation - <?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/master.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/datatable.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
</head>

<body>
    <div id="loading">
        <img id="loading-image" src="<?= base_url('assets/img/loader.gif'); ?>" alt="Loading..." />
    </div>

    <div class="layout-wrapper">
        <?= $this->include('layouts/sidebar'); ?>
        <?= $this->include('layouts/navbar'); ?>

        <?= $this->renderSection('content'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <?= $this->renderSection('js'); ?>
</body>

</html>