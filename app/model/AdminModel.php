<?php

class AdminModel{
  
  private $db;
  
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpweb;charset=utf8', 'root', '');
  }

  function getAdminByUsername($username){
    $query = $this->db->prepare("SELECT * FROM `tb_admin` WHERE nombre_usuario = ?");
    $query->execute([$username]);
    $user = $query->fetch(PDO::FETCH_OBJ);

    return $user;
  }
}