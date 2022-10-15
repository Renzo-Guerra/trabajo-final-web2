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
      if(!isset($_POST['username']) || !isset($_POST['password'])){$this->register_view->showLogIn("El nombre de usuario o la contraseña no esta setteado."); die();}
      if(is_null($_POST['username']) || is_null($_POST['password'])){$this->register_view->showLogIn("El nombre de usuario o la contraseña son null."); die();}
      if(empty($_POST['username']) || empty($_POST['password'])){$this->register_view->showLogIn("El nombre de usuario o la contraseña estan 'vacios'."); die();}

      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $admin = $this->admin_model->getAdminByUsername($username);
      if(empty($admin)){$this->register_view->showLogIn("El nombre de usuario o la contraseña son incorrectos"); die();}
      
      $validation = password_verify($password, $admin->contrasenia);
      
      if($validation){
        session_start();
        $_SESSION['USERNAME'] = $admin->nombre_usuario;
        header("Location: " . BASE_URL);
        die();
      }else{
        $this->register_view->showLogIn("El nombre de usuario o la contraseña son incorrectos");
      }
    }

    function showLoguearsePage($error = null){
      $this->register_view->showLogIn($error);
    }

    function logOut(){
      session_start();
      session_destroy();

      header("Location: " . BASE_URL);
    }
  }
