@if (Session::has('flash_message') || Session::has('flash_level'))
<script>
  $(document).ready(function() {
    toastr.{{ session('flash_level') }}("{{ session('flash_message') }}")
  });
</script>
@endif
