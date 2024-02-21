<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= (@$title) ? "{$title} - {$option->web_name}" : $option->web_name ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("public/assets/img/{$option->logo}") ?>">
    <link href="<?= base_url("public/admin_side/vendor/toastr/css/toastr.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/vendor/jqvmap/css/jqvmap.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/vendor/chartist/css/chartist.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/vendor/select2/css/select2.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/vendor/bootstrap-select/dist/css/bootstrap-select.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url('public/admin_side/vendor/lineicons/lineicons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/admin_side/vendor/summernote/summernote.css') ?>" rel="stylesheet">
    <link href="<?= base_url("public/admin_side/css/style.css?v=1.0") ?>" rel="stylesheet">

    <script src="<?= base_url("public/admin_side/vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("public/admin_side/vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
    <script>
        let base_url = '<?= base_url() ?>';
        let admin_panel_url = '<?= base_url('adminino') ?>';
        let current_url = '<?= current_url() ?>';
    </script>
</head>

<body>