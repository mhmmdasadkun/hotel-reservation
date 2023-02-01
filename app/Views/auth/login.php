<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aat Hotel - Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/master.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
    <div class="card-container w-50">
        <div class="card border-0 shadow">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
                <?= $this->include('components/alerts'); ?>
                <form method="post" action="login" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="ad_email" class="form-label">Email Address</label>
                        <input type="email" name="ad_email" class="form-control <?= $validation->hasError('ad_email') ? 'is-invalid' : ''; ?>" id="ad_email" placeholder="Masukan email address" value="<?= set_value('ad_email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ad_email'); ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ad_password" class="form-label">Password</label>
                        <input type="password" name="ad_password" class="form-control <?= $validation->hasError('ad_password') ? 'is-invalid' : ''; ?>" id="ad_password" placeholder="Masukan password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ad_password'); ?>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>