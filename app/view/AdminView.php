<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class AdminView{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }

    function showAddProperty($users){
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/addProperty.tpl');
    }

    function showAddUser(){
      $this->smarty->display('pages/addUser.tpl');
    }

    function editUser($user_data){
      // Parsing the varchar to int (The form only accepts 'number')
      $user_data->telefono = intval($user_data->telefono);
      $this->smarty->assign('user', $user_data);
      $this->smarty->display('pages/editUser.tpl');
    }
    
    // Given a data array, displays a form with the data in the array
    function editProperty($property_data, $users){
      $this->smarty->assign('property', $property_data);
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/editProperty.tpl');
    }
    
  }