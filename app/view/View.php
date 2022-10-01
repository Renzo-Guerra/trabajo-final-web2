<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class View{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }

    function displayAllProperties($properties){
      $this->smarty->assign('properties', $properties);

      $this->smarty->display('home-show_all_properties.tpl');
    }
  }