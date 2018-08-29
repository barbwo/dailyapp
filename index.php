<?php
  require __DIR__ . '/vendor/autoload.php';
  require __DIR__ . '/routes.php';

  use Symfony\Component\Routing\RequestContext;
  use Symfony\Component\Routing\Matcher\UrlMatcher;
  use Symfony\Component\Routing\Exception\ResourceNotFoundException;

  define('ENV', parse_ini_file(__DIR__ . '/.env'));
  define('VIEW_PATH', __DIR__ . '/src/Views/');

  if(ENV['APP_ENV'] === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
  }

  $context = new RequestContext('/');
  $matcher = new UrlMatcher($routes, $context);
  $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  try{
    extract($matcher->match($path));
  } catch (ResourceNotFoundException $e) {
    extract($matcher->match('/'));
  }
  $_controller = "DailyApp\\Controllers\\" . $_controller;
  $_controller = new $_controller;
  //$_controller->$_method();
  call_user_func(array($_controller, $_method));