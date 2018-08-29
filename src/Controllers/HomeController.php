<?php
namespace DailyApp\Controllers;

class HomeController extends Controller {
  public function homeAction(){
    $this->render('Home/home');
  }
  public function organizerAction(){
    $this->render('Home/organizer');
  }
  public function aboutAction(){
    $this->render('Home/about');
  }
}