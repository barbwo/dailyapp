<?php
namespace DailyApp\Controllers;

use DailyApp\Models\User;

abstract class Controller {
  public $errors;
  public $informations;
  public function __construct() {
    session_start();
    $this->errors = $this->informations = [];
  }
  public function render($viewName) {
    include VIEW_PATH . $viewName . ".php";
  }
  public function redirect($path = '') {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/' . $path );
  }
  public function post($key){
    return isset($_POST[$key])?htmlspecialchars($_POST[$key]):'';
  }
  public function isLogged(){
    if(isset($_SESSION['name']))
      return true;
    return false;
  }
  public function setSession(User $user) {
    $_SESSION['name'] = $user->getName();
    $_SESSION['email'] = $user->getEmail();
  }
}