<?php
  ob_start(); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="offset-md-2 col-md-8">
        <h1 class="text-center mb-4">Organizer</h1>
        <?php include VIEW_PATH . 'alerts.php'; ?>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <p>Brak planów.</p>
      </div>
    </div>
  </div>
  <?php
  $content = ob_get_clean();
  include VIEW_PATH . 'layout.php';