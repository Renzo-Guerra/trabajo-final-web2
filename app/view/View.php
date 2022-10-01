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
    
    function showAddProperty(){
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
  }