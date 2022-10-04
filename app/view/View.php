<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class View{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }

    function displayProperties($properties){
      $this->smarty->assign('properties', $properties);
      $this->smarty->display('pages/home.tpl');
    }
    
    function showAddProperty($users){
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/addProperty.tpl');
    }
    
    function showAddUser(){
      $this->smarty->display('pages/addUser.tpl');
    }

    // Can't reuse because has different attributes from property
    function displayAllUsers($users){
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/users.tpl');
    }

    // Given a data array, displays a form with the data in the array
    function editProperty($property_data, $users){
      $this->smarty->assign('property', $property_data);
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/editProperty.tpl');
    }

    function showRegister(){
      $this->smarty->display('pages/addAdmin.tpl');
    }
    function showLogIn(){
      $this->smarty->display('pages/logIn.tpl');
    }

    function wrongCredentials(){
      $this->smarty->display('pages/wrongLogIn.tpl');
    }
    
    function goodCredentials(){
      $this->smarty->display('pages/goodLogIn.tpl');
    }

    function showProperty($property_and_user){
      $this->smarty->assign('property_and_user', $property_and_user);
      $this->smarty->display('pages/property.tpl');
    }
  }