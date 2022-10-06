<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class RegisterView{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
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
  }