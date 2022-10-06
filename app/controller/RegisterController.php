<?php
  require_once './app/model/AdminModel.php';
  require_once './app/view/RegisterView.php';
  
  class RegisterController{
    private $admin_model;
    private $register_view;

    public function __construct(){
      $this->admin_model = new AdminModel();
      $this->register_view = new RegisterView();
    }
  
    function verifyLogIn(){
      // Validations
      if(!isset($_POST['username']) || !isset($_POST['password'])){ header("Location: " . BASE_URL);}
      if(is_null($_POST['username']) || is_null($_POST['password'])){ header("Location: " . BASE_URL);}
      if(empty($_POST['username']) || empty($_POST['password'])){ header("Location: " . BASE_URL);}

      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $ok = $this->admin_model->verifyLogIn($username, $password);
      if($ok){
        $this->register_view->goodCredentials();
      }else{
        $this->register_view->wrongCredentials();
      }
    }

    function showRegisterPage(){
      $this->register_view->showRegister();
    }

    function showLoguearsePage(){
      $this->register_view->showLogIn();
    }


  }
