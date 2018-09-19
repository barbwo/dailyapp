<?php
namespace DailyApp\Controllers;

class HomeController extends Controller {
  public function homeAction(){
    $this->render('Home/home');
  }
  public function organizerAction(){
    if($this->user)
      return $this->render('Home/organizer', ['user' => $this->user]);
    else
      return $this->redirect('login');
  }
  public function aboutAction(){
    $this->render('Home/about');
  }
}