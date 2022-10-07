<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class PropertyView{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }

    function displayProperties($properties){
      $this->smarty->assign('properties', $properties);
      $this->smarty->display('pages/home.tpl');
    }

    function showProperty($property_and_user){
      $this->smarty->assign('property_and_user', $property_and_user);
      $this->smarty->display('pages/property.tpl');
    }
    
    function showAddProperty($users){
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/addProperty.tpl');
    }

    // Given a data array, displays a form with the data in the array
    function editProperty($property_data, $users){
      $this->smarty->assign('property', $property_data);
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/editProperty.tpl');
    }
  }