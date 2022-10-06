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
    
  }