<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Tài khoản demo</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body account-demo">
    <div class="account-group row">
      <div class="col-md-10 p-0">
        <p class="mb-0 email">Email: superadministrator@gmail.com</p>
        <p class="mb-0 password">Password: 123123</p>
      </div>
      <div class="col-md-2">
        <button class="btn btn-info p-1 copy">Copy</button>
      </div>
    </div>

    <hr>
    <div class="account-group row">
      <div class="col-md-10 p-0">
        <p class="mb-0 email">Email: administrator@gmail.com</p>
        <p class="mb-0 password">Password: 123123</p>
      </div>
      <div class="col-md-2">
        <button class="btn btn-info p-1 copy">Copy</button>
      </div>
    </div>
    <hr>
    <div class="account-group row">
      <div class="col-md-10 p-0">
        <p class="mb-0 email">Email: user@gmail.com</p>
        <p class="mb-0 password">Password: 123123</p>
      </div>
      <div class="col-md-2">
        <button class="btn btn-info p-1 copy">Copy</button>
      </div>
    </div>
  </div>
</div>

<script>
  // copy account
$(document).ready(() => {
  $.each($('.copy'), function (key, value) {
    $(value).on('click', e => {
      let email = $(this).parents('.account-group').find('p.email').text().substring(7);
      let password = $(this).parents('.account-group').find('p.password').text().substring(10);
      $('#login-form input[name="email"]').val(email);
      $('#login-form input[name="password"]').val(password);
    })
  });
});
</script>
