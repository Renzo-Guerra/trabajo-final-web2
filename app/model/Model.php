<?php

  class Model{
    
    private $db;

    public function __construct(){
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpweb;charset=utf8', 'root', '');
    }

    // Obtains all the properties from 'tb_propiedad'
    function getAllProperties(){
      $query = $this->db->prepare("SELECT * FROM tb_propiedad");
      $query->execute();
      $properties = $query->fetchAll(PDO::FETCH_OBJ);

      return $properties;
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

    // Determines weather a property already has that specific id
    function existProperty($id){
      $query = $this->db->prepare("SELECT * FROM `tb_propiedad` WHERE `id` = ?");
      $query->execute([$id]);
      //Use 'fetch' instead of 'fetchAll' because the dni of the owner MUST be unic, it is imposible to exist 2 equals dni
      $property = $query->fetch(PDO::FETCH_OBJ);
      
      // If already exists a property with that id returns true, otherwise returns false.
      return (empty($property))? false : true;
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
     * Adds a new property to the table (only if the owner dni already exists in the table 'tb_propietario')
     */
    function addNewPropertyToDB($title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $owner_dni){
      // Confirm the existance of a user with that dni
      $exist = $this->existUser($owner_dni);
      if(!$exist){ return;}

      $query = $this->db->prepare("INSERT INTO `tb_propiedad`(`titulo`, `tipo`, `operacion`, `descripcion`, `precio`, `metros_cuadrados`, `ambientes`, `banios`, `permite_mascotas`, `propietario`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $query->execute([$title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $owner_dni]);
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

    function getAllPropertiesWhereOperacionEquals($operation){
      $query = $this->db->prepare("SELECT * FROM tb_propiedad WHERE `operacion` = ?");
      $query->execute([$operation]);
      $properties = $query->fetchAll(PDO::FETCH_OBJ);

      return $properties;
    }

    function deleteProperty($id_property){
      $query = $this->db->prepare("DELETE FROM tb_propiedad WHERE `id` = ?");
      $query->execute([$id_property]);
    }

    // Given a id, returns it data.
    function getPropertyById($id_property){
      $query = $this->db->prepare("SELECT * FROM tb_propiedad WHERE `id` = ?");
      $query->execute([$id_property]);
      $property = $query->fetch(PDO::FETCH_OBJ);

      return $property;
    }

    // Edit the data of the property (in the DB)
    function editPropertyDB($id, $title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $owner_dni){
      if($this->existProperty($id) && $this->existUser($owner_dni)){
        $query = $this->db->prepare("UPDATE tb_propiedad SET `titulo` = ? ,`tipo` = ?,`operacion` = ?,`descripcion` = ?,`precio` = ?,`metros_cuadrados` = ?,`ambientes` = ?,`banios` = ?,`permite_mascotas` = ?,`propietario` = ? WHERE `id` = ?");
        $query->execute([$title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $owner_dni, $id]);
      }
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
  }