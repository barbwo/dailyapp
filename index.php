<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');

  require __DIR__ . '/vendor/autoload.php';
  require __DIR__ . '/routes.php';

  $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  if(isset($routes[$path]))
    include $routes[$path];
  else
    include $routes['/'];