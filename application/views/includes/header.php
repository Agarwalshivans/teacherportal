<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">

  <title><?= $site_name; ?></title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/core/core.css">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/flatpickr/css/flatpickr.min.css">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>fonts/feather-font/css/iconfont.css">
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/datatable/css/dataTables.bootstrap.css" />
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/datatable/css/responsive.dataTables.min.css" />
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/datatable/css/buttons.dataTables.min.css" />
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/select2/css/select2.min.css" />
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/dropify/css/dropify.min.css" />
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/sweetalert2/css/sweetalert2.min.css" />
  <!-- End plugin css for this page -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>css/style.css">
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>css/custom.css">
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>js/easymde/easymde.min.css">
  <!-- End layout styles -->

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= DEFAULT_ASSETS ?>favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= DEFAULT_ASSETS ?>favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= DEFAULT_ASSETS ?>favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= DEFAULT_ASSETS ?>favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= DEFAULT_ASSETS ?>favicon/favicon-16x16.png">
  <link rel="manifest" href="<?= DEFAULT_ASSETS ?>favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?= DEFAULT_ASSETS ?>favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

</head>
<!-- Translate code here -->
<body class="sidebar-dark navbar-dark">
  <div class="main-wrapper">
    <?php include('sidebar.php'); ?>
    <div class="page-wrapper">
      <?php include('topbar.php'); ?>