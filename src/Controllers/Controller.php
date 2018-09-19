<?php
namespace DailyApp\Controllers;

use Twig_Loader_Filesystem;
use Twig_Environment;

use DailyApp\Models\User;
use DailyApp\Repositories\UserRepository;

abstract class Controller {
  public $errors;
  public $informations;
  protected $user;
  protected static $userRepository;
  private static $twig;

  public function __construct() {
    session_start();
    $this->errors = $this->informations = [];
    self::setTwig();
    self::setUserRepository();
    $this->setUser();
  }
  private static function setTwig() {
    if(!self::$twig) {
      $loader = new Twig_Loader_Filesystem(VIEW_PATH);
      self::$twig = new Twig_Environment($loader, [
      'cache' => CACHE_PATH, 'debug' => (bool) ENV['DEBUG']
      ]);
    }
  }
  private static function setUserRepository() {
    if(!self::$userRepository)
      self::$userRepository = new UserRepository();
  }
  private function setUser() {
    if(!$this->user && isset($_SESSION['email'])) {
        $this->user = self::$userRepository->findByEmail($_SESSION['email']);
    }
  }
  public function render($viewName, $vars = []) {
    $template =  $viewName . ".html";
    $vars = array_merge($vars, ['errors' => $this->errors], ['informations' => $this->informations]);
    echo self::$twig->render($template, $vars);
  }
  public function redirect($path = '') {
    header('Location: http://' . $_SERVER['SERVER_NAME'] . '/' . $path );
  }
  public function post($key){
    return isset($_POST[$key])?htmlspecialchars($_POST[$key]):'';
  }
  public function isLogged(){
    if(isset($_SESSION['email']) && $this->user)
      return true;
    return false;
  }
  public function setSession(User $user) {
    $_SESSION['email'] = $user->getEmail();
  }
}