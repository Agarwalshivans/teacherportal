<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <title><?= $site_name; ?> | <?= $page_title; ?></title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/core/core.css">
  <!-- endinject -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>fonts/feather-font/css/iconfont.css">
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>plugins/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->

  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= DEFAULT_ASSETS ?>css/style.css">
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

<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page"
      style="background:url('./assets/images/background.jpg');background-size:cover;background-repeat:no-repeat;">
      <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-4 col-lg-4 col-xl-4 col-xxl-3 mx-auto">
            <div class="card">

              <div class="col-md-12">
                <div class="auth-form-wrapper p-2">
                  <div class="text-center">
                    <a href="<?= BASE_URL ?>login" class="noble-ui-logo d-block mb-2"><?= $panel_name; ?> Login</a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                  </div>

                  <?php if(!empty($this->session->flashdata('error'))): ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('error'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                  </div>
                  <?php endif; ?>

                  <?php $attributes = array('class' => 'forms-sample', 'id' => 'loginForm', 'method'=>'post'); ?>
                  <?= form_open(BASE_URL . 'login', $attributes); ?>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off"
                      value="teacher@gmail.com" />
                    <?= form_error('email','<span class="text-danger">','</span>'); ?>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="123456">
                    <?= form_error('password','<span class="text-danger">','</span>'); ?>
                  </div>
                  <div class="mb-3">
                    <?= $captcha; ?>
                  </div>
                  <div class="mb-3">
                    <label for="captcha" class="form-label">Enter Captcha</label>
                    <input type="text" class="form-control" id="captcha" name="captcha" autocomplete="off"
                      value="123456" />
                    <?= form_error('password','<span class="text-danger">','</span>'); ?>
                  </div>
                  <div class="d-grid mb-1">
                    <button type="submit" class="btn btn-primary mb-2 mb-md-0 text-white btn-block">Login</button>
                  </div>
                  <?= form_close(); ?>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- core:js -->
  <script src="<?= DEFAULT_ASSETS ?>plugins/core/core.js"></script>
  <!-- endinject -->
  <!--Plugins-->
  <script src="<?= DEFAULT_ASSETS ?>plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/jquery-validation/additional-methods.js"></script>
  <!--End Plugins-->
  <!-- inject:js -->
  <script src="<?= DEFAULT_ASSETS ?>plugins/feather-icons/feather.min.js"></script>
  <!-- endinject -->

  <script>
    jQuery.validator.setDefaults({
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
          error.insertAfter(element.parent().parent());
        } else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
          error.appendTo(element.parent().parent());
        } else {
          error.insertAfter(element);
        }
      },
      highlight: function (element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $(element).addClass("is-invalid").removeClass("is-valid");
        }
      },
      unhighlight: function (element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $(element).addClass("is-valid").removeClass("is-invalid");
        }
      }
    });

    $("#loginForm").validate({
      rules: {
        email: {
          required: true,
        },
        password: {
          required: true,
          minlength: 6
        },
        captcha: {
          required: true,
          minlength: 6
        }
      }
    });
  </script>
</body>

</html>