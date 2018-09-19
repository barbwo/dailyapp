<?php
namespace DailyApp\Controllers;

use DailyApp\Models\User;

class UserController extends Controller {
  public function showAction() {
    if($this->isLogged())
      $this->render('User/show', ['user' => $this->user]);
    else
      return $this->redirect('login');

  }
  public function registerAction() {
    if($this->isLogged())
      $this->redirect('organizer');
    $name = $this->post('name');
    $email = $this->post('email');
    $password = $this->post('password');
    $passwordConfirmation = $this->post('confirm');
    if(isset($_POST['submit'])) {
      if(empty($name) || empty($email) || empty($password) || empty($passwordConfirmation)) {
        $this->errors[] = "Wszystkie pola powinny być uzupełnione.";
      } else if($password !== $passwordConfirmation) {
          $this->errors[] = "<strong>Hasła</strong> nie są jednakowe.";
        } else {
          $this->user = new User($name, $email, password_hash($password, PASSWORD_DEFAULT));
          if($this->user->validate()) {
            $result = self::$userRepository->create($this->user);
            if($result){
              $this->setSession($this->user);
              $this->informations[] = "<strong>$name</strong>, witaj w dailyApp!";
              return $this->render('Home/organizer', ['user' => $this->user]);
            }
            $this->errors[] = "Niestety dodawanie konta nie powiodło się.";
          }
          $this->errors = array_merge($this->errors, $this->user->getErrors());
        }
      }
    return  $this->render('User/register', ['post' => compact('name', 'email', 'password', 'passwordConfirmation')]);
  }
  public function loginAction() {
    if($this->isLogged())
      $this->redirect('organizer');
    $email = $this->post('email');
    $password = $this->post('password');
    if(isset($_POST['submit'])) {
      if(empty($email) || empty($password)) {
        $this->errors[] = "Wprowadź login i hasło.";
      } else {
        $this->user = self::$userRepository->findByEmail($email);
        if($this->user && $this->user->verifyPassword($password)) {
          $this->setSession($this->user);
          $name = $this->user->getName();
          $this->informations[] = "<strong>$name</strong>, właśnie się zalogowałeś!";
          return $this->render('Home/organizer', ['user' => $this->user]);
        }
          $this->errors[] = "Niepoprawny login lub hasło.";
      }
    }
    return  $this->render('User/login', ['post' => compact('email', 'password')]);
  }
  public function logoutAction() {
    session_unset();
    session_destroy();
    return $this->redirect();
  }
}