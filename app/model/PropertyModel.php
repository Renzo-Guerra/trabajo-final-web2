<?php
require_once 'UserModel.php';
class PropertyModel{
  
  private $db;
  private $user;

  public function __construct(){
    $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpweb;charset=utf8', 'root', '');
    $this->user = new UserModel();
  }

  // Obtains all the properties from 'tb_propiedad'
  function getAllProperties(){
    $query = $this->db->prepare("SELECT * FROM tb_propiedad");
    $query->execute();
    $properties = $query->fetchAll(PDO::FETCH_OBJ);

    return $properties;
  }

  // Determines weather a property already has that specific id
  function existProperty($id){
    $query = $this->db->prepare("SELECT * FROM `tb_propiedad` WHERE `id` = ?");
    $query->execute([$id]);
    //Use 'fetch' instead of 'fetchAll' because the dni of the user MUST be unic, it is imposible to exist 2 equals dni
    $property = $query->fetch(PDO::FETCH_OBJ);
    
    // If already exists a property with that id returns true, otherwise returns false.
    return (empty($property))? false : true;
  }

  /**
   * Adds a new property to the table (only if the user dni already exists in the table 'tb_propietario')
   */
  function addNewPropertyToDB($title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $user_dni){
    // Confirm the existance of a user with that dni
    $exist = $this->user->existUser($user_dni);
    if(!$exist){ return;}

    $query = $this->db->prepare("INSERT INTO `tb_propiedad`(`titulo`, `tipo`, `operacion`, `descripcion`, `precio`, `metros_cuadrados`, `ambientes`, `banios`, `permite_mascotas`, `propietario`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $user_dni]);
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
  function editPropertyDB($id, $title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $user_dni){
    if($this->existProperty($id) && $this->user->existUser($user_dni)){
      $query = $this->db->prepare("UPDATE tb_propiedad SET `titulo` = ? ,`tipo` = ?,`operacion` = ?,`descripcion` = ?,`precio` = ?,`metros_cuadrados` = ?,`ambientes` = ?,`banios` = ?,`permite_mascotas` = ?,`propietario` = ? WHERE `id` = ?");
      $query->execute([$title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $user_dni, $id]);
    }
  }
  function getPropertyAndUserById($id_property){
    $query = $this->db->prepare("SELECT a.*, b.nombre, b.apellido, b.telefono, b.mail FROM tb_propiedad AS a JOIN tb_propietario AS b ON a.propietario = b.dni WHERE a.id = ?");
    $query->execute([$id_property]);
    $property_and_user = $query->fetch(PDO::FETCH_OBJ);

    return $property_and_user;
  }
}