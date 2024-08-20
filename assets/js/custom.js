$(document).ready(function () {
  //initialize dropify
  $('.dropify').dropify();

  //initialize select2 elements
  $('.select2').select2();

  // date picker 
  if($('#flatpickr-date').length) {
    flatpickr("#flatpickr-date", {
      wrap: true,
      dateFormat: "Y-m-d",
    });
  };

  // year picker 
  if($('#flatpickr-year').length) {
    flatpickr("#flatpickr-year", {
      wrap: true,
      dateFormat: "Y",
    });
  };

  // date range picker 
  if($('#flatpickr-range').length) {
    flatpickr("#flatpickr-range", {
      wrap: true,
      mode: "range",
      dateFormat: "Y-m-d",
    });
  };


  // time picker
  if($('#flatpickr-time').length) {
    flatpickr("#flatpickr-time", {
      wrap: true,
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
    });
  };
});


jQuery.validator.setDefaults({
  errorPlacement: function (error, element) {
    error.addClass("invalid-feedback");
    if (element.parent('.input-group').length) {
      error.insertAfter(element.parent());
    } else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
      error.insertAfter(element.parent().parent());
    } else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
      error.appendTo(element.parent().parent());
    } else {
      error.insertAfter(element);
    }
  },
  highlight: function (element, errorClass) {
    if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
      $(element).addClass("is-invalid").removeClass("is-valid");
    }
  },
  unhighlight: function (element, errorClass) {
    if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
      $(element).addClass("is-valid").removeClass("is-invalid");
    }
  }
});


$(document).on("click", "[id=previewDocument]", function () {
  let link = $(this).data('link');
  PDFObject.embed(link, "#pdfRenderer");
  $('#pdf_modal').modal('show');
});




// `limit` is in bytes
jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
  return !element.files[0] || (element.files[0].size <= limit);
}, function(limit, element) {
  let size = (limit/1024)/1024;
  return `Please select maximum file size of ${size} MB.`;
});