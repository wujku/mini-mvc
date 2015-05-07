<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">Create new user</div>
      <div class="panel-body">
        <form action="<?= get_url('user/store') ?>" method="POST">
          <div class="form-group">
            <input type="email" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success pull-right">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>