
<!-- partial:partials/_footer.html -->
  <footer
    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
    <p class="text-muted mb-1 mb-md-0">Copyright © 2024 <a href="#" target="_blank"><?= $site_name; ?></a>.</p>
    <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
  </footer>
  <!-- partial -->

  <div class="modal fade bd-example-modal-xl" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" id="pdf_modal">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-body">
        <div id="pdfRenderer" style="width: 100%; height: 600px;"></div>
      </div>
    </div>
  </div>
</div>

  </div>
  </div>

  <!--Plugins -->
  <!-- core:js -->
  <script src="<?= DEFAULT_ASSETS ?>plugins/core/core.js"></script>
  <!-- inject:js -->
  <!-- Plugin js for this page -->
  <script src="<?= DEFAULT_ASSETS ?>plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/jquery-validation/additional-methods.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/flatpickr/js/flatpickr.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/dropify/js/dropify.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/sweetalert2/js/sweetalert2.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/select2/js/select2.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>plugins/feather-icons/feather.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>js/pdfobject.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>js/template.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>js/language.js"></script>

  <!-- End plugin js for this page -->

  <!-- Custom js for this page -->
  <script src="<?= DEFAULT_ASSETS ?>js/custom.js"></script>
  <!-- End custom js for this page -->


  <!-- Tinymce js for this page -->
  <script src="<?= DEFAULT_ASSETS ?>js/tinymce/tinymce.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>js/tinymce.js"></script>
  <!-- End Tinymce js for this page -->

  <!-- Easymde js for this page -->
  <script src="<?= DEFAULT_ASSETS ?>js/easymde/easymde.min.js"></script>
  <script src="<?= DEFAULT_ASSETS ?>js/easymde.js"></script>
  <!-- End Easymde js for this page -->

  <?php if(!empty($this->session->flashdata('error'))): ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
    });

    Toast.fire({
      icon: 'error',
      title: '<?= $this->session->flashdata('error'); ?>'
    });
  </script>
  <?php endif; ?>
  <?php if(!empty($this->session->flashdata('success'))): ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000,
      timerProgressBar: true,
    });

    Toast.fire({
      icon: 'success',
      title: '<?= $this->session->flashdata('success'); ?>'
    });
  </script>
  <?php endif; ?>
  <?php (isset($_extra_scripts))? $this->load->view($_extra_scripts) : ''; ?>
  </body>

  </html>