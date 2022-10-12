<?php
  require_once './app/model/PropertyModel.php';
  require_once './app/model/UserModel.php';
  require_once './app/view/PropertyView.php';

  
  class PropertyController{
    private $property_model;
    private $user_model;
    private $property_view;

    public function __construct(){
      $this->property_model = new PropertyModel();
      $this->user_model = new UserModel();
      $this->property_view = new PropertyView();
    }

    function showHomePage(){
      session_start();
      $properties = $this->property_model->getAllProperties();
      $this->property_view->displayProperties($properties);
    }

    // Validates if every variable is setted and is not null or empty
    function addNewProperty(){
      session_start();
      if(!isset($_SESSION['USERNAME'])){header("Location: " . BASE_URL);}
      $this->propertyValidation();

      $title = $_GET['titulo'];
      $type = $_GET['tipo'];
      $operation = $_GET['operacion'];
      $description = $_GET['descripcion'];
      $price = $_GET['precio'];
      $square_meters = $_GET['metros_cuadrados'];
      $rooms = $_GET['ambientes'];
      $bathrooms = $_GET['banios'];
      $allow_pets = $_GET['permite_mascotas'];
      $user_dni = $_GET['propietario'];

      // 'Add' data to the DB
      $this->property_model->addNewPropertyToDB($title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $user_dni);
      
      // Redirection
      header("Location: " . BASE_URL);
    }

    // Given a operation, the page will show properties that fulfill the 'operation' ('alquiler'/'venta')
    function showPropertiesOperation($operation){
      session_start();
      $properties = $this->property_model->getAllPropertiesWhereOperacionEquals($operation);
      $this->property_view->displayProperties($properties);
    }

    /* Delete a property, then display the homePage */
    function deleteProperty($id_property){
      session_start();
      if(!isset($_SESSION['USERNAME'])){header("Location: " . BASE_URL);}
      $this->property_model->deleteProperty($id_property);
      header("Location: " . BASE_URL);
    }

    function showEditProperty($id_property){
      session_start();
      if(!isset($_SESSION['USERNAME'])){header("Location: " . BASE_URL);}
      $property_data = $this->property_model->getPropertyById($id_property);
      // If the data is "false"...
      if(empty($property_data)){header("Location: " . BASE_URL);}
      
      // Get users to show dnis from a select -> option (HTML)
      $users = $this->user_model->getAllUsers();
      $this->property_view->editProperty($property_data, $users);
    }

    function showAddPropertyPage(){
      session_start();
      if(!isset($_SESSION['USERNAME'])){header("Location: " . BASE_URL);}
      $users = $this->user_model->getAllUsers();
      $this->property_view->showAddProperty($users);
    }
    
    // Validates the isset, is_null and empty. Plus select/options and radio values.
    private function propertyValidation(){
      // Validations
      if(!isset($_GET['titulo']) || !isset($_GET['tipo']) || !isset($_GET['operacion']) || !isset($_GET['descripcion']) || !isset($_GET['precio']) || !isset($_GET['metros_cuadrados']) || !isset($_GET['ambientes']) || !isset($_GET['banios']) || !isset($_GET['permite_mascotas']) || !isset($_GET['propietario'])){ header("Location: " . BASE_URL);}
      if(is_null($_GET['titulo']) || is_null($_GET['tipo']) || is_null($_GET['operacion']) || is_null($_GET['descripcion']) || is_null($_GET['precio']) || is_null($_GET['metros_cuadrados']) || is_null($_GET['ambientes']) || is_null($_GET['banios']) || is_null($_GET['permite_mascotas']) || is_null($_GET['propietario'])){ header("Location: " . BASE_URL);}
      if(empty($_GET['titulo']) || empty($_GET['tipo']) || empty($_GET['operacion']) || empty($_GET['descripcion']) || empty($_GET['precio']) || empty($_GET['metros_cuadrados']) || empty($_GET['ambientes']) || empty($_GET['banios']) || empty($_GET['permite_mascotas']) || empty($_GET['propietario'])){ header("Location: " . BASE_URL);}
      // Validations of select and radio inputs 
      if(($_GET['tipo'] != 'casa') && ($_GET['tipo'] != 'departamento') && ($_GET['tipo'] != 'ph') && ($_GET['tipo'] != 'fondo de comercio') && ($_GET['tipo'] != 'terreno baldio')){ header("Location: " . BASE_URL);}
      if(($_GET['operacion'] != 'alquiler') && ($_GET['operacion'] == 'venta')){ header("Location: " . BASE_URL);}
      if(($_GET['permite_mascotas'] != "true") && ($_GET['permite_mascotas'] != "false")){ header("Location: " . BASE_URL);}
    }

    function editProperty(){
      session_start();
      if(!isset($_SESSION['USERNAME'])){header("Location: " . BASE_URL);}
      $this->propertyValidation();

      $id = $_GET['id'];
      $title = $_GET['titulo'];
      $type = $_GET['tipo'];
      $operation = $_GET['operacion'];
      $description = $_GET['descripcion'];
      $price = $_GET['precio'];
      $square_meters = $_GET['metros_cuadrados'];
      $rooms = $_GET['ambientes'];
      $bathrooms = $_GET['banios'];
      $allow_pets = $_GET['permite_mascotas'];
      $user_dni = $_GET['propietario'];
      // 'edit' data in the DB
      $this->property_model->editPropertyDB($id, $title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $user_dni);
      
      // Redirection
      header("Location: " . BASE_URL);
    }

    function showProperty($id_property){
      session_start();
      $exist = $this->property_model->existProperty($id_property);
      // Validation
      if(!$exist){header("Location: " . BASE_URL);}
      // Get property and user data
      $property_and_user = $this->property_model->getPropertyAndUserById($id_property);
      $this->property_view->showProperty($property_and_user);
    }
  }