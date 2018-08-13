<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../src/assets/css/style.min.css">
    <title>dailyApp</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="/"><i class="far fa-clock mr-1"></i>dailyApp</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarLinks" aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarLinks" class="collapse navbar-collapse">
          <div class="navbar-nav ml-auto">
            <a class="btn btn-outline-primary nav-item nav-link mx-1" href="#">Dziś</a>
            <a class="btn btn-outline-primary nav-item nav-link mx-1" href="#">Tydzień</a>
            <a class="nav-item nav-link" href="#">Organizer</a>
            <div class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item">Ustawienia</a>
                <a class="dropdown-item">Wyloguj</a>
              </div>
            </div>
            <a class="nav-item nav-link" href="#">Statystyki</a>
          </div>
        </div>
       </nav>
    </header>
    <main>
      <?php echo $content; ?>
    </main>
    <footer id="stickyFooter">
      <nav class="nav bg-light justify-content-center py-1">
          <a class="nav-item nav-link" href="/"><b>dailyApp</b></a>
          <a class="nav-item nav-link" href="/about">O aplikacji</a>
          <a class="nav-item nav-link" href="#">Kontakt</a>
      </nav>
    </footer>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/popper.js/dist/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
      // $('.btn').css('background-color','LightCyan');
    </script>
  </body>
</html>