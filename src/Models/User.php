<?php
namespace DailyApp\Models;

use DailyApp\Repositories\UserRepository;

class User {
  private $name;
  private $email;
  private $password;
  private $errors;
  public function __construct($name, $email, $password) {
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
  }
  public function validate() {
    $this->errors = null;
    $userRepository = new UserRepository();
    if(!preg_match("/^[a-zA-Z]*$/", $this->name)) {
      $this->errors[] = "<strong>Imię</strong> może zawierać tylko litery.";
    }
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->errors[] = "Adres <strong>email</strong> nie wygląda na prawidłowy.";
    } else if($userRepository->findByEmail($this->email)) {
      $this->errors[] = "Już istnieje użytkownik z tym adresem <strong>email</strong>.";
    }
    return $this->errors?false:true;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getName() {
    return $this->name;
  }
  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }
  public function setPassword($password) {
    $this->password = $password;
  }
  public function getPassword() {
    return $this->password;
  }
  public function verifyPassword($password){
    return password_verify($password, $this->password);
  }
  public function getErrors() {
    return $this->errors;
  }
}