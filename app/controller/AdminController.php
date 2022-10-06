<?php
  require_once './app/model/AdminModel.php';
  require_once './app/view/AdminView.php';

  class AdminController{
    private $admin_model;
    private $admin_view;

    public function __construct(){
      $this->admin_model = new AdminModel();
      $this->admin_view = new AdminView();
    }

    function addNewAdmin(){
      // Validations
      if(!isset($_POST['username']) || !isset($_POST['password'])){ header("Location: " . BASE_URL);}
      if(is_null($_POST['username']) || is_null($_POST['password'])){ header("Location: " . BASE_URL);}
      if(empty($_POST['username']) || empty($_POST['password'])){ header("Location: " . BASE_URL);}

      $username = $_GET['username'];
      $password = $_GET['password'];
      
      $this->admin_model->addAdmin($username, $password);

      // Redirection
      header("Location: " . BASE_URL);
    }

    function showAddUserPage(){
      $this->admin_view->showAdduser();
    }
    
  }
