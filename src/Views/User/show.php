  <?php
  ob_start(); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col text-center">
        <h1>Ustawienia</h1>
        <h4 class="my-4">Moje dane</h4>
        <table class="table">
          <tbody>
            <tr><td>Imię</td><td><?php echo $this->user->name; ?></td></tr>
            <tr><td>Email</td><td><?php echo $this->user->email; ?></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
  $content = ob_get_clean();
  include VIEW_PATH . 'layout.php';