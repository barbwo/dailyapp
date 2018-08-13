<?php
  ob_start(); ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col text-center">
        <h1>O aplikacji</h1>
        <p>Something about me ;)</p>
      </div>
    </div>
  </div>
  <?php
  $content = ob_get_clean();
  include 'layout.php';