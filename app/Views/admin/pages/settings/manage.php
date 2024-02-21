<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $title ?></h4>
                    </div>
                    <?php if (!empty($option)) : ?>
                        <?php $query = (array)$option; ?>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="#" method="post" id="update-form">
                                    <div class="row p-2">
                                        <div class="col-md m-2 align-self-center">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" name="logo" id="imageUpload" accept=".png, .jpg, .jpeg">
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style=" border-radius:0px; background-image: url('<?= base_url(image("/public/assets/img/", $option->logo)) ?>');">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($query as $key => $value) : ?>
                                            <?php if (in_array($key, ['web_name'])) : ?>
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="<?= $key ?>" value="<?= htmlentities($value); ?>">
                                                    </div>
                                                </div>
                                            <?php elseif (in_array($key, ['description', 'keywords', 'short_about', 'homepage_description', 'frontend_popup_announcement_css'])) : ?>
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <textarea class="form-control" name="<?= $key ?>" rows="4"><?= htmlentities($value); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php elseif (in_array($key, ['frontend_popup_announcement'])) : ?>
                                                <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <textarea class="form-control summernote_description" name="<?= $key ?>"><?= htmlentities($value); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php elseif (in_array($key, ['timezone'])) : ?>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="<?= $key ?>" value="<?= htmlentities($value); ?>">
                                                        <small class="text-danger">Use only supported timezones, <a href="https://www.php.net/manual/en/timezones.php" target="_blank">PHP supported timezones</a></small>
                                                    </div>
                                                </div>
                                            <?php elseif (in_array($key, ['smtp_active', 'stripe_is_active', 'smtp_validate_cert', 'alfalah_is_active', 'recaptcha_is_active'])) : ?>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select id="inputRoleSelect" class="form-control" name="<?= $key ?>">
                                                            <option value="1" <?= ($value == 1) ? 'selected' : ''; ?>>Activated</option>
                                                            <option value="0" <?= ($value == 0) ? 'selected' : ''; ?>>Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php elseif (in_array($key, ['smtp_encryption'])) : ?>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select id="inputRoleSelect" class="form-control" name="<?= $key ?>">
                                                            <option value="ssl" <?= ($value == 'ssl') ? 'selected' : ''; ?>>SSL</option>
                                                            <option value="tls" <?= ($value == 'tls') ? 'selected' : ''; ?>>TLS</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php elseif (in_array($key, ['paypal_mode'])) : ?>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select id="inputRoleSelect" class="form-control" name="<?= $key ?>">
                                                            <option value="sandbox" <?= ($value == 'sandbox') ? 'selected' : ''; ?>>Sandbox</option>
                                                            <option value="live" <?= ($value == 'live') ? 'selected' : ''; ?>>Live</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            <?php elseif (!in_array($key, ['logo', 'smtp_active'])) : ?>
                                                <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                        <label><?= ucwords(str_replace('_', ' ', $key)) ?>
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" name="<?= $key ?>" value="<?= htmlentities($value); ?>">
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if ($permission->hasPermission('settings', 'edit')) : ?>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="button" id="submitBtn" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>