<?php
namespace DailyApp\Controllers;

use DailyApp\Models\User;
use DailyApp\Repositories\UserRepository;

class UserController extends Controller {
  public $userRepository;
  public function __construct(){
    parent::__construct();
    $this->userRepository = new UserRepository();
  }
  public function showAction() {
    $this->user = new User();
    $this->render('User/show');
  }
  public function registerAction() {
    if($this->isLogged())
      $this->redirect('organizer');
    if(isset($_POST['submit'])) {
      $name = $this->post('name');
      $email = $this->post('email');
      $password = $this->post('password');
      $passwordConfirmation = $this->post('confirm');
      if(empty($name) || empty($email) || empty($password) || empty($passwordConfirmation)) {
        $this->errors[] = "Wszystkie pola powinny być uzupełnione.";
      } else if($password !== $passwordConfirmation) {
          $this->errors[] = "<strong>Hasła</strong> nie są jednakowe.";
        } else {
          $user = new User($name, $email, password_hash($password, PASSWORD_DEFAULT));
          if($user->validate()) {
            $result = $this->userRepository->create($user);
            if($result){
              $this->setSession($user);
              $this->informations[] = "<strong>$name</strong>, witaj w dailyApp!";
              return $this->render('Home/organizer');
            }
            $this->errors[] = "Niestety dodawanie konta nie powiodło się.";
          }
          $this->errors = array_merge($this->errors, $user->getErrors());
        }
      }
    return  $this->render('User/register');
  }
  public function loginAction() {
    if($this->isLogged())
      $this->redirect('organizer');
    if(isset($_POST['submit'])) {
      $email = $this->post('email');
      $password = $this->post('password');
      if(empty($email) || empty($password)) {
        $this->errors[] = "Wprowadź login i hasło.";
      } else {
        $user = $this->userRepository->findByEmail($email);
        if($user && $user->verifyPassword($password)) {
          $this->setSession($user);
          $name = $user->getName();
          $this->informations[] = "<strong>$name</strong>, właśnie się zalogowałeś!";
          return $this->render('Home/organizer');
        }
          $this->errors[] = "Niepoprawny login lub hasło.";
      }
    }
    return  $this->render('User/login');
  }
  public function logoutAction() {
    session_unset();
    session_destroy();
    return $this->redirect();
  }
}