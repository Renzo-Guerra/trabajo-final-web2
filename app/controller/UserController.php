<?php
  require_once './app/model/UserModel.php';
  require_once './app/view/UserView.php';

  class UserController{
    private $user_model;
    private $user_view;

    public function __construct(){
      $this->user_model = new UserModel();
      $this->user_view = new UserView();
    }

    // Validates if every variable is setted and is not null or empty
    function addNewUser(){
      // Validations
      
      $name = $_GET['name'];
      $surname = $_GET['surname'];
      $dni = $_GET['dni'];
      $phone = $_GET['phone'];
      $mail = $_GET['mail'];
      
      // 'Add' data to the DB
      $this->user_model->addNewUserToDB($dni, $name, $surname, $phone, $mail);

      // Redirection
      header("Location: " . BASE_URL);
    }

    function showUsersPage(){
      $users = $this->user_model->getAllUsers();
      $this->user_view->displayAllUsers($users);
    }

    private function userValidation(){
      if(!isset($_GET['dni']) || !isset($_GET['name']) || !isset($_GET['surname']) || !isset($_GET['phone']) || !isset($_GET['mail'])){ header("Location: " . BASE_URL);}
      if(is_null($_GET['dni']) || is_null($_GET['name']) || is_null($_GET['surname']) || is_null($_GET['phone']) || is_null($_GET['mail'])){ header("Location: " . BASE_URL);}
      if(empty($_GET['dni']) || empty($_GET['name']) || empty($_GET['surname']) || empty($_GET['phone']) || empty($_GET['mail'])){ header("Location: " . BASE_URL);}
    }

    function deleteUser($user_dni){
      $this->user_model->deleteUser($user_dni);

      header("Location: " . BASE_URL . "propietarios");
    }

    function showEditUserPage($user_dni){
      // Validation
      if(!$this->user_model->existUser($user_dni)){header("Location: " . BASE_URL);}
      
      $user_data = $this->user_model->getUserById($user_dni);
      $this->user_view->editUser($user_data);
    }

    function editUserDB(){
      // Validations 
      $this->userValidation(); // checks the 'isset', 'is_null' and 'empty'
      if(!$this->user_model->existUser($_GET['dni'])){header("Location: " . BASE_URL);}

      $this->user_model->editUser($_GET['dni'], $_GET['name'], $_GET['surname'], $_GET['phone'], $_GET['mail']);

      header("Location: " . BASE_URL);
    }

    function showAddUserPage(){
      $this->user_view->showAdduser();
    }
  }