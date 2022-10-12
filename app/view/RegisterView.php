<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class RegisterView{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }
    
    function showLogIn($error = null){
      $this->smarty->assign('error', $error);
      $this->smarty->display('pages/logIn.tpl');
    }
  }