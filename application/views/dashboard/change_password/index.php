<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?></li>
    </ol>
  </nav>

  <?php if(!empty(validation_errors())):?>
  <div class="alert alert-danger"><?= validation_errors('<p class="m-0"><i class="fa fa-times"></i>','</p>'); ?></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6 offset-md-3">
      <?php $attributes = array('class' => 'forms-sample', 'id' => 'changePasswordForm', 'method'=>'post'); ?>
      <?= form_open(BASE_URL . 'change-password', $attributes); ?>
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
          <span><strong><i class="fa fa-lock"></i>&nbsp;<?= $page_title; ?></strong></span>
        </div>
        <div class="card-body">

          <div class="mb-3">
            <label for="o_password" class="form-label">Old Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="o_password" name="o_password" autocomplete="off" />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">New Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="password" name="password" autocomplete="off" />
          </div>

          <div class="mb-3">
            <label for="c_password" class="form-label">Confirm Password<span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="c_password" name="c_password" autocomplete="off" />
          </div>
        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary me-2">Update</button>
        </div>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>