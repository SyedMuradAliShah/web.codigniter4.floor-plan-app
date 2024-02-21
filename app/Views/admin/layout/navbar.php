<div id="preloader" style="z-index: 9999999;">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>


<div id="main-wrapper" class="show">

    <div class="nav-header">
        <a href="<?= base_url() ?>" class="brand-logo">
            <span class="h2 mt-2 p-3 border shadow rounded"><?= substr(get_initials($option->web_name), 0, 2) ?></span>
            <img class="logo-compact" src="<?= base_url("public/assets/img/{$option->logo}") ?>" alt="<?= $option->web_name ?>">
            <img class="brand-title" src="<?= base_url("public/assets/img/{$option->logo}") ?>" alt="<?= $option->web_name ?>">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="dashboard_bar">
                            <?= ($title) ? $title : 'Dashboard' ?>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link dz-fullscreen" href="#">
                                <svg id="icon-full" viewBox="0 0 24 24" width="26" height="26" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                                </svg>
                                <svg id="icon-minimize" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize">
                                    <path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <div class="header-info">
                                    <span><?= "{$session->get('admin_full_name')}"; ?></span>
                                    <small><?= $session->get('admin_role_name') ?></small>
                                </div>
                                <img src="<?= base_url(image("/public/uploads/admins/", $session->get('admin_image'))) ?>" width="20" alt="<?= "{$session->get('admin_full_name')}"; ?>" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?= base_url(route_to('admin_profile')) ?>" class="dropdown-item ai-icon">
                                    <i class="fa fa-user"></i><span class="ml-2">Update Profile </span>
                                </a>
                                <a href="<?= base_url(route_to('admin_logout')) ?>" class="dropdown-item ai-icon">
                                    <i class="fa fa-sign-out"></i><span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>