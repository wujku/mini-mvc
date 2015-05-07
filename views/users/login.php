<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-heading">Enter your credentials</div>
      <div class="panel-body">
        <form action="<?= get_url('user/check') ?>" method="POST">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username ?>">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">Log in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>