<?php
namespace DailyApp\Repositories;

use PDO;
use DailyApp\Models\User;

class UserRepository {
  public $pdo;
  public function __construct() {
    try {
      $dsn = "mysql:host=" . ENV['DB_HOST'] . ";dbname=" . ENV['DB_NAME'];
      $this->pdo = new PDO($dsn, ENV['DB_USER'], ENV['DB_PASSWORD']);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  public function create(User $user) {
    $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) values (:name, :email, :password)");
    return $stmt->execute([':name' =>$user->getName(), ':email' => $user->getEmail(), ':password' => $user->getPassword()]);
  }
  public function findByEmail($email) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
    $result = $stmt->execute([':email' => $email]);
    if(!$result || $stmt->rowCount() !== 1) return false;
    $userRow = $stmt->fetch();
    return new User($userRow['name'], $userRow['email'], $userRow['password']);
  }
}