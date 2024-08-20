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
      <?php $attributes = array('class' => 'forms-sample', 'id' => 'myProfileForm', 'method'=>'post','enctype'=>'multipart/form-data'); ?>
      <?= form_open(BASE_URL . 'my-profile', $attributes); ?>
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
          <span><strong><i class="fa fa-user"></i>&nbsp;<?= $page_title; ?></strong></span>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name&nbsp;<span class="text text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $details->name; ?>"
              autocomplete="off">
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