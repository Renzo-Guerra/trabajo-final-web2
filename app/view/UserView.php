<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class UserView{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }

    function displayAllUsers($users){
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/users.tpl');
    }
    
    function showAddUser(){
      // As the add and edit user uses the same template, it MUST have the variable $user
      $this->smarty->assign('user', null);
      $this->smarty->assign('form_headign', "Nuevo usuario");
      $this->smarty->assign('confirm_button', "Agregar usuario");
      $this->smarty->display('pages/addUser.tpl');
    }

    function editUser($user_data){
      // Parsing the varchar to int (The form only accepts 'number')
      $user_data->telefono = intval($user_data->telefono);
      $this->smarty->assign('user', $user_data);
      $this->smarty->assign('form_headign', "Editar usuario");
      $this->smarty->assign('confirm_button', "Confirmar cambios");
      $this->smarty->display('pages/editUser.tpl');
    }
  }