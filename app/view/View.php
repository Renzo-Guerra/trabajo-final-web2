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
    
    function showAddOwner(){
      $this->smarty->display('pages/addOwner.tpl');
    }

    // Can't reuse because has different attributes from property
    function displayAllOwners($owners){
      $this->smarty->assign('owners', $owners);
      $this->smarty->display('pages/owners.tpl');
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
  }