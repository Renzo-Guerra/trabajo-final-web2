<?php
  require_once './app/model/Model.php';
  require_once './app/view/View.php';

  class Controller{
    private $model;
    private $view;

    public function __construct(){
      $this->model = new Model();
      $this->view = new View();
    }

    function showHome(){
      $properties = $this->model->getAllProperties();
      $this->view->displayAllProperties($properties);
    }

    function addNewUser(){
      // Validations
      if(!isset($_GET['dni']) || !isset($_GET['name']) || !isset($_GET['surname']) || !isset($_GET['phone']) || !isset($_GET['mail'])){ return;}
      if(is_null($_GET['dni']) || is_null($_GET['name']) || is_null($_GET['surname']) || is_null($_GET['phone']) || is_null($_GET['mail'])){ return;}
      if(empty($_GET['dni']) || empty($_GET['name']) || empty($_GET['surname']) || empty($_GET['phone']) || empty($_GET['mail'])){ return;}
      
      $name = $_GET['name'];
      $surname = $_GET['surname'];
      $dni = $_GET['dni'];
      $phone = $_GET['phone'];
      $mail = $_GET['mail'];
      
      // 'Add' data to the DB
      $this->model->addNewUserToDB($dni, $name, $surname, $phone, $mail);

      // Redirection
      header("Location: " . BASE_URL);
    }

    // Future functions to implement:
    // function displaySellingProperties()
    // function displayRentingProperties()
  }