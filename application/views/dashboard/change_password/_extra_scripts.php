<script>
  $("form").validate({
    rules: {
      o_password: {
        required: true,
      },
      password: {
        required: true
      },
      c_password: {
        required: true
      }
    }
  });
</script>