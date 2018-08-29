  <?php
  ob_start(); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="offset-md-2 col-md-8">
        <h1 class="text-center mb-4">Rejestracja</h1>
        <?php include VIEW_PATH . 'alerts.php'; ?>
      </div>
    </div>
    <div class="row">
      <div class="offset-md-4 col-md-4">
        <form method="POST">
          <input name="name" type="text" class="form-control my-2" placeholder="Imię" value="<?php echo $this->post('name'); ?>">
          <input name="email" type="email" class="form-control my-2" placeholder="Email" value="<?php echo $this->post('email'); ?>">
          <input name="password" type="password" class="form-control my-2" placeholder="Hasło" value="<?php echo $this->post('password'); ?>">
          <input name="confirm" type="password" class="form-control my-2" placeholder="Powtórz hasło" value="<?php echo $this->post('confirm'); ?>">
          <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block my-2">Załóż konto</button>
        </form>
      </div>
    </div>
  </div>
  <?php
  $content = ob_get_clean();
  include VIEW_PATH . 'layout.php';