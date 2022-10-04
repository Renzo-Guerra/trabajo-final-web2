<?php

class UserModel{
  
  private $db;

  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpweb;charset=utf8', 'root', '');
  }
  
  // Determines weather a user already has that specific dni
  function existUser($user_dni){
    $query = $this->db->prepare("SELECT * FROM `tb_propietario` WHERE `dni` = ?");
    $query->execute([$user_dni]);
    //Use 'fetch' instead of 'fetchAll' because the dni of the owner MUST be unic, it is imposible to exist 2 equals dni
    $user = $query->fetch(PDO::FETCH_OBJ);
    
    // If already exists a user with that DNI returns true, otherwise returns false.
    return (empty($user))? false : true;
  }

  // Adds the new user to the DB
  function addNewUserToDB($dni, $name, $surname, $phone, $mail){
    // Validation wheather it already exists a user with that dni
    $exist = $this->existUser($dni);
    if($exist){ return;}

    $query = $this->db->prepare("INSERT INTO `tb_propietario` (`dni`, `nombre`, `apellido`, `telefono`, `mail`) VALUES (?, ?, ?, ?, ?)");
    $query->execute([$dni, $name, $surname, $phone, $mail]);
  }

  /**
   * Obtains all the owners from 'tb_propietarios'
   */
  function getAllOwners(){
    $query = $this->db->prepare("SELECT * FROM tb_propietario");
    $query->execute();
    $owners = $query->fetchAll(PDO::FETCH_OBJ);

    return $owners;
  }
}