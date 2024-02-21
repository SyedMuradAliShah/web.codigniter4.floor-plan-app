<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= (@$title) ? "{$title} - {$option->web_name}" : $option->web_name ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("public/assets/img/{$option->logo}") ?>">
    <link href="<?= base_url("public/admin_side/vendor/bootstrap-select/dist/css/bootstrap-select.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/css/style.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
    <script src="<?= base_url("public/admin_side/vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("public/admin_side/vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>

    <script>
        let base_url = '<?= base_url() ?>';
        let admin_panel_url = '<?= base_url('adminino') ?>';
        let current_url = '<?= current_url() ?>';
    </script>
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img class="img-fluid" src="<?= base_url("public/assets/img/{$option->logo}") ?>" alt="<?= $option->web_name ?>" >
                                    </div>
                                    <h4 class="text-center mb-4"><?= $title ?></h4>
                                    <form id="loginForm">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter e-mail">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <a href="<?=base_url('adminino')?>">Want to Login?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary btn-block">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url("public/admin_side/vendor/global/global.min.js") ?>"></script>
    <script src="<?= base_url("public/admin_side/vendor/bootstrap-select/dist/js/bootstrap-select.min.js") ?>"></script>
    <script src="<?= base_url("public/admin_side/js/custom.min.js") ?>"></script>
    <script src="<?= base_url("public/admin_side/js/deznav-init.js") ?>"></script>

</body>

</html>