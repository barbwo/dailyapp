  <?php
  ob_start(); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="offset-md-2 col-md-8">
        <h1 class="text-center mb-4">Logowanie</h1>
        <?php include VIEW_PATH . 'alerts.php'; ?>
      </div>
    </div>
    <div class="row">
      <div class="offset-md-4 col-md-4">
        <form method="POST">
          <input name="email" type="email" class="form-control my-2" placeholder="Email" value="<?php echo $this->post('email'); ?>">
          <input name="password" type="password" class="form-control my-2" placeholder="Hasło"  value="<?php echo $this->post('password'); ?>">
          <div class="form-check">
            <input id="remember" name="remember" type="checkbox" class="form-check-input" disabled>
            <label for="remember" class="form-check-label">Zapamiętaj mnie</label>
          </div>
          <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block my-2">Zaloguj</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  $content = ob_get_clean();
  include VIEW_PATH . 'layout.php';