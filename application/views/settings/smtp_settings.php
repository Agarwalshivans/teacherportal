<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?></li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-6  offset-md-3">
      <?php $attributes = array('class' => 'forms-sample', 'id' => 'smtpSettingForm', 'method'=>'post','enctype'=>'multipart/form-data'); ?>
      <?= form_open(BASE_URL . 'smtp-settings', $attributes); ?>
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
          <span><strong><i class="fa fa-cog"></i>&nbsp;<?= $page_title; ?></strong></span>
        </div>
        <div class="card-body">
          <?php foreach($all_settings as $setting): ?>
          <?php $input_type = json_decode($setting['input_type']); ?>
          <?php if($input_type->type == 'text'): ?>
          <div class="mb-3">
            <label for="<?= $setting['key']; ?>" class="form-label"><?= $setting['label']; ?><span
                class="text-danger">*</span></label>
            <input type="text" class="form-control" id="<?= $setting['key']; ?>" name="<?= $setting['key']; ?>"
              value="<?= stripslashes($setting['value']); ?>" autocomplete="off" placeholder="Name" parsley-required>
            <?= form_error("'" . $setting['key'] . "'",'<span class="text-danger">','</span>'); ?>
          </div>
          <?php endif; ?>
          <?php if($input_type->type == 'textarea'): ?>
          <div class="mb-3">
            <label for="<?= $setting['key']; ?>" class="form-label"><?= $setting['label']; ?><span
                class="text-danger">*</span></label>
            <textarea type="text" class="form-control" id="<?= $setting['key']; ?>" name="<?= $setting['key']; ?>"
              autocomplete="off" placeholder="Name" rows="10"
              parsley-required><?= stripslashes($setting['value']); ?></textarea>
            <?= form_error("'" . $setting['key'] . "'",'<span class="text-danger">','</span>'); ?>
          </div>
          <?php endif; ?>
          <?php if($input_type->type == 'select'): ?>
          <div class="mb-3">
            <label for="<?= $setting['key']; ?>" class="form-label"><?= $setting['label']; ?><span
                class="text-danger">*</span></label>
            <select class="select2 form-control" style="width:100%;" id="<?= $setting['key']; ?>"
              name="<?= $setting['key']; ?>" parsley-required>
              <option value="">--Select Option--</option>
              <?php foreach($input_type->options as $key => $value): ?>
              <option value="<?= $key; ?>" <?= ($key == $setting['value']) ? 'selected':''; ?>><?= $value; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary me-2">Update</button>
        </div>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>