<?php
  ob_start(); ?>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4 px-2">dailyApp</h1>
      <br/>
      <p class="lead px-2">dailyApp will be type of personal organizer. Stay tuned!</p>
      <br/>
      <button class="btn btn-primary btn-lg">Want more?</button>
    </div>
  </div>
  <?php
  $content = ob_get_clean();
  include 'layout.php';