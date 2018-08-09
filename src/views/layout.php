<!DOCTYPE html>
<html>
  <head>
    <title>dailyApp</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../src/assets/css/style.css">
  </head>
  <body>
    <div class="container">
      <header>
        <a id="logo" href="/">dailyApp</a>
        <nav>
          <a href="/about">O stronie</a>
        </nav>
      </header>
      <main>
        <?php echo $content; ?>
        <button class="btn btn-default">Want more?</button>
      </main>
    </div>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
      $('.btn').css('background-color','LightCyan');
    </script>
  </body>
</html>