<nav class="sidebar">
  <div class="sidebar-header">
    <a href="<?= BASE_URL ?>dashboard" class="sidebar-brand" style="font-size: 22px;">
      <?= $panel_name; ?>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item">
        <a href="<?= BASE_URL ?>dashboard" class="nav-link">
          <i class="fa fa-star"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <!-- <li class="nav-item nav-category">Main</li> -->
      <li class="nav-item">
        <a href="<?= BASE_URL ?>student" class="nav-link">
          <i class="fa fa-users"></i>
          <span class="link-title">Student</span>
        </a>
      </li>

      <!-- <li class="nav-item">
        <a href="<?= BASE_URL ?>record" class="nav-link">
          <i class="fa fa-users"></i>
          <span class="link-title">Record</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#master" role="button" aria-expanded="false"
          aria-controls="master">
          <i class="fa fa-sitemap"></i>
          <span class="link-title">Master</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="master">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="<?= BASE_URL ?>countries" class="nav-link">Countries</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL ?>organization" class="nav-link">Organization</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#product" role="button" aria-expanded="false"
          aria-controls="product">
          <i class="fa fa-cog"></i>
          <span class="link-title">Settings</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="product">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="<?= BASE_URL ?>general-settings" class="nav-link">General Settings</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL ?>smtp-settings" class="nav-link">SMTP Settings</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL ?>social-links-settings" class="nav-link">Social Links Settings</a>
            </li>
          </ul>
        </div>
      </li> -->
      <li class="nav-item">
        <a href="<?= BASE_URL ?>logout" class="nav-link">
          <i class="fa fa-sign-out"></i>
          <span class="link-title">Logout</span>
        </a>
      </li>
    </ul>
  </div>
</nav>