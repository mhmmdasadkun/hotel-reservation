<!-- Navbar -->
<div class="navbar-wrapper">
    <div class="navbar-main">
        <div class="navbar-left">
            <div class="navbar-animate">
                <i class="bx bx-menu-alt-left"></i>
            </div>
        </div>
        <div class="navbar-right">
            <div class="navbar-notification">
                <i class="bx bx-bell"></i>
            </div>
            <div class="navbar-profile">
                <img src="<?= base_url('assets/img/profile.jpg') ?>" alt="Profile">
                <div class="profile-info">
                    <span class="profile-title"><?= $session->username; ?></span>
                    <span class="profile-subtitle"><?= $session->role_name; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>