<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            <li class="<?= ($uri->getSegment(2) == 'dashboard') ? 'mm-active' : '' ?>">
                <a href="<?= base_url(uri_segements([1], "dashboard")) ?>" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <?php if (
                $permission->hasPermission('admins', 'view') ||
                $permission->hasPermission('admin_roles', 'view')
            ) : ?>
                <li class="<?= (in_array($uri->getSegment(2), ['admins', 'admin_roles'])) ? 'mm-active' : '' ?>">
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="lni lni-lock"></i>
                        <span class="nav-text">Admins</span>
                    </a>
                    <ul aria-expanded="false">
                        <?php if ($permission->hasPermission('admins', 'view')) : ?>
                            <li class="<?= ($uri->getSegment(2) == 'admins') ? 'mm-active' : '' ?>">
                                <a href="<?= base_url(route_to('admin_admins')) ?>">Admins</a>
                            </li>
                        <?php endif ?>
                        <?php if ($permission->hasPermission('admin_roles', 'view')) : ?>
                            <li class="<?= ($uri->getSegment(2) == 'roles') ? 'mm-active' : '' ?>">
                                <a href="<?= base_url(route_to('admin_roles')) ?>">Admin Roles</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </li>
            <?php endif ?>

            <?php if (
                $permission->hasPermission('categories', 'view') ||
                $permission->hasPermission('category_images', 'view')
            ) : ?>
                <li class="<?= (in_array($uri->getSegment(2), ['categories', 'category-images'])) ? 'mm-active' : '' ?>">
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="la la-codepen"></i>
                        <span class="nav-text">Floors</span>
                    </a>
                    <ul aria-expanded="false">
                        <?php if ($permission->hasPermission('categories', 'view')) : ?>
                            <li class="<?= (($uri->getSegment(2) == 'categories')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url(route_to('admin_category')) ?>">Categories</a>
                            </li>
                        <?php endif ?>
                        <?php if ($permission->hasPermission('category_images', 'view')) : ?>
                            <li class="<?= (($uri->getSegment(2) == 'category-images')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url(route_to('admin_category_images')) ?>">Images</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </li>
            <?php endif ?>


            <?php if ($permission->hasPermission('settings', 'view')) : ?>
                <li class="<?= (in_array($uri->getSegment(2), ['settings'])) ? 'mm-active' : '' ?>">
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="la la-cog"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                    <ul aria-expanded="false">
                        <li class="<?= (($uri->getSegment(2) == 'settings')) ? 'mm-active' : '' ?>">
                            <a href="<?= base_url(route_to('admin_settings')) ?>">Settings</a>
                        </li>
                    </ul>
                </li>
            <?php endif ?>

            <?php if (
                $permission->hasPermission('email_logs', 'view') ||
                $permission->hasPermission('admin_activities', 'view')
            ) : ?>
                <li class="<?= (in_array($uri->getSegment(2), ['email_logs', 'admin_activity'])) ? 'mm-active' : '' ?>">
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="la la-stack-overflow"></i>
                        <span class="nav-text">Logs</span>
                    </a>
                    <ul aria-expanded="false">
                        <?php if ($permission->hasPermission('email_logs', 'view')) : ?>
                            <li class="<?= (($uri->getSegment(2) == 'email_logs')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url("adminino/email_logs") ?>">Email Logs</a>
                            </li>
                        <?php endif ?>
                        <?php if ($permission->hasPermission('admin_activity', 'view')) : ?>
                            <li class="<?= (($uri->getSegment(2) == 'admin_activity')) ? 'mm-active' : '' ?>">
                                <a href="<?= base_url("adminino/admin_activity") ?>">Admin Activity</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </li>
            <?php endif ?>

        </ul>
        <div class="copyright ">
            <p><strong><?= $option->web_name ?></strong> © <?= date("Y") ?></p>
            <p>Developed by <a href="https://www.softwareflare.com/" target="_blank">Software Flare</a></p>
        </div>
    </div>
</div>