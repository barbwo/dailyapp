<?php
  use Symfony\Component\Routing\RouteCollection;
  use Symfony\Component\Routing\Route;
  use DailyApp\Controllers\UserController;

  $routes = new RouteCollection();

  $routes->add('home', new Route('/', array('_controller' => 'HomeController', '_method' => 'homeAction')));
  $routes->add('organizer', new Route('/organizer', array('_controller' => 'HomeController', '_method' => 'organizerAction')));
  $routes->add('about', new Route('/about', array('_controller' => 'HomeController', '_method' => 'aboutAction')));
  $routes->add('profile', new Route('/profile', array('_controller' => 'UserController', '_method' => 'showAction')));
  $routes->add('register', new Route('/register', array('_controller' => 'UserController', '_method' => 'registerAction')));
  $routes->add('login', new Route('/login', array('_controller' => 'UserController', '_method' => 'loginAction')));
  $routes->add('logout', new Route('/logout', array('_controller' => 'UserController', '_method' => 'logoutAction')));