<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/dataTables.responsive.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/dataTables.bootstrap.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/buttons.bootstrap.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/buttons.html5.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/buttons.print.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/jszip.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/pdfmake.min.js"></script>
<script src="<?= DEFAULT_ASSETS ?>plugins/datatable/js/vfs_fonts.js"></script>
<script>
  $(document).ready(function () {
    var table = $('#dataTable').DataTable({
      dom: 'Bfrtip',
      buttons: [{
        text: '<i class="fa fa-plus"></i>&nbsp;Add',
        className: 'btn btn-success',
        action: function (e, dt, node, config) {
          window.location = 'student-add';
        }
      }],
      responsive: true,
      processing: true,
      serverSide: true,
      rowReorder: true,
      scrollX: false,
      serverMethod: 'post',
      pageLength: 50,
      ajax: {
        url: '<?= BASE_URL ?>' + 'student-list',
        language: {
          processing: "<i class='fa fa-processing'></i>"
        },
        data: function (d) {
        },
      },
      columns: [{
          data: 'id'
        },
        {
          data: 'name'
        },
        {
          data: 'subject_name'
        },
        {
          data: 'marks'
        },
        {
          data: 'action', // Ensure this field is included in the server response
          
        }
      ],
      dom:
      "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-4 text-center'f><'col-sm-12 col-md-2 text-center'l>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      drawCallback: function () {
        $('.dataTables_paginate > .pagination a').addClass('page-link');
        var search_input = $('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Search');
      }
    });
  });
</script>