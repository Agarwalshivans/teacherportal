<style>
        .hidden {
            display: none;
        }
    </style>
<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= BASE_URL ?>student"><?= $page_menu; ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?></li>
    </ol>
  </nav>

  <?php if(!empty(validation_errors())):?>
  <div class="alert alert-danger"><?= validation_errors('<p class="m-0"><i class="fa fa-times"></i>','</p>'); ?></div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6 offset-md-3 grid-margin">
      <?php $attributes = array('class' => 'forms-sample', 'id' => 'add', 'method'=>'post','enctype' => 'multipart/formdata'); ?>
      <?= form_open(BASE_URL . 'student-add', $attributes); ?>
      <div class="card">  
        <div class="card-header d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
          <span><strong><i class="fa fa-plus"></i>&nbsp;<?= $page_title; ?></strong></span>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="name" class="form-label">Name<span class="text text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" autocomplete="off"/>
          </div>
          <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name<span class="text text-danger">*</span></label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" autocomplete="off"/>
          </div>
          <div class="mb-3">
            <label for="marks" class="form-label">Marks<span class="text text-danger">*</span></label>
            <input type="number" class="form-control" id="marks" name="marks" autocomplete="off"/>
          </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary me-2"><i class="fa fa-save"></i>&nbsp;Submit</button>
        </div>
      </div>
      <?= form_close(); ?>

    </div>
  </div>
</div>