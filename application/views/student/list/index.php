<div class="page-content">

  <nav class="page-breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= BASE_URL ?>dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?= BASE_URL ?>student"><?= $page_menu; ?></a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?></li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
          <span><strong><i class="fa fa-list"></i>&nbsp;<?= $page_title; ?></strong></span>
        </div>
        <div class="card-body">
          <table id="dataTable" class="table no-footer">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Name</th>
                <th>Subject Name</th>
                <th>Marks</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>