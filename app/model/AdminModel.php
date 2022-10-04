<?php

class AdminModel{
  
  private $db;
  
  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpweb;charset=utf8', 'root', '');
  }
  // Determines weather an admin already has that specific username
  function existAdmin($username){
    $query = $this->db->prepare("SELECT `nombre_usuario` FROM tb_admin WHERE nombre_usuario = ?");
    $query->execute([$username]);
    $admin = $query->fetch(PDO::FETCH_OBJ);

    return (empty($admin))? false : true;
  }

  function addAdmin($username, $password){
    // Validation
    if($this->existAdmin($username)){ return;}
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    // Insert new admin into tb_admin
    $query = $this->db->prepare("INSERT INTO tb_admin (`nombre_usuario`, `contrasenia`) VALUES (?, ?)");
    $query->execute([$username, $hashed_password]);
  }

  function getAdminByUsername($username){
    $query = $this->db->prepare("SELECT * FROM `tb_admin` WHERE nombre_usuario = ?");
    $query->execute([$username]);
    $user = $query->fetch(PDO::FETCH_OBJ);

    return $user;
  }

  function verifyLogIn($username, $password){
    // Validates weather the username already exists
    if(!$this->existAdmin($username)){ return false;}
    
    $admin = $this->getAdminByUsername($username);
    return (password_verify($password, $admin->contrasenia))? true : false;
  }
}