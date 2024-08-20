<script>
  $("#add").validate({
    rules: {
      area: {
        required: true,
      },
      state_name: {
        required: true,
      },
      district_name: {
        required: true,
      },
      nss_unit_code: {
        required: true,
      },
      state_code: {
        required: true,
      },
      district_code: {
        required: true,
      }
      // country_id: {
      //   required: {
      //     depends: function(element) {
      //       let val = $("#is_country_or_organization").val();
      //       console.log(val);
      //       if(val == 'Country'){
      //         return true
      //       } else {
      //         return false
      //       }
      //     }
      //   }
      // },
      // organization_id: {
      //   required: {
      //     depends: function(element) {
      //       let val = $("is_country_or_organization").val();
      //       if(val == 'Organization'){
      //         return true
      //       } else {
      //         return false
      //       }
      //     }
      //   }
      // },
      // delegate_attachment:{ 
      //   accept: "application/pdf",
      //   extension: "pdf",
      //   fileSizeLimit: 10*1024*1024
      // },
      // mou_document:{ 
      //   required:true,
      //   accept: "application/pdf",
      //   extension: "pdf",
      //   fileSizeLimit: 10*1024*1024
      // }
    },
    // messages: {
    //   delegate_attachment: {
    //     accept: "Please select a valid PDF File.",
    //     extension: "Please select a valid PDF File.",
    //   },
    //   mou_document: {
    //     accept: "Please select a valid PDF File.",
    //     extension: "Please select a valid PDF File.",
    //   },
    // },
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

  function toggleFields() {
      var for_each_student = document.getElementById("for_each_student").value;
      var additionalFields = document.getElementById("additionalFields");
      if (for_each_student === "Yes") {
          additionalFields.classList.remove("hidden");
      } else {
          additionalFields.classList.add("hidden");
      }
  }

  $(document).on("change","#state_code",function(){
    let state_code = $(this).val();
    let url = `<?= BASE_URL ?>get-district/${state_code}`;
    fetch(url)
    .then((resp) => {
      return resp.json();
    })
    .then((resp) => {
      if(resp.status == true)
      {
        $('#district_code').html(resp.options);
      }
    })
    .catch((err) => {
      console.log(err);
    })
  });
</script>