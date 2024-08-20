<script>
  $("#edit").validate({
    rules: {
      name: {
        required: true,
      },
      subject_name: {
        required: true,
      },
      marks: {
        required: true,
      }
    },
  });

  // $(document).on("change","#is_country_or_organization",function(){
  //   let val = $(this).val();
  //   if(val == 'Country') {
  //     $('#countryContainer').show();
  //     $('#organizationContainer').hide();
  //   } else {
  //     $('#countryContainer').hide();
  //     $('#organizationContainer').show();
  //   }
  // });

  // flatpickr("#daterange", {
  //   mode: "range",
  //   dateFormat: "Y-m-d"
  // });

  // tinymce.init({
  //   selector: '#remark',
  //   min_height: 500,
  //   menubar: false,
  //   branding: false,
  //   image_advtab: false,
  //   plugins: [
  //     'advlist', 'autoresize', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak',
  //     'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
  //   ],
  //   toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
  // });
</script>