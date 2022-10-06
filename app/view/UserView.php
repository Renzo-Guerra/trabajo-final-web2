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
    
  }