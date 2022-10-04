<?php
  require_once './app/model/AdminModel.php';
  require_once './app/model/PropertyModel.php';
  require_once './app/model/UserModel.php';
  require_once './app/view/View.php';

  class Controller{
    private $admin_model;
    private $property_model;
    private $user_model;
    private $view;

    public function __construct(){
      $this->admin_model = new AdminModel();
      $this->property_model = new PropertyModel();
      $this->user_model = new UserModel();
      $this->view = new View();
    }

    function showHomePage(){
      $properties = $this->property_model->getAllProperties();
      $this->view->displayProperties($properties);
    }

    
    // Validates if every variable is setted and is not null or empty
    function addNewUser(){
      // Validations
      if(!isset($_GET['dni']) || !isset($_GET['name']) || !isset($_GET['surname']) || !isset($_GET['phone']) || !isset($_GET['mail'])){ header("Location: " . BASE_URL);}
      if(is_null($_GET['dni']) || is_null($_GET['name']) || is_null($_GET['surname']) || is_null($_GET['phone']) || is_null($_GET['mail'])){ header("Location: " . BASE_URL);}
      if(empty($_GET['dni']) || empty($_GET['name']) || empty($_GET['surname']) || empty($_GET['phone']) || empty($_GET['mail'])){ header("Location: " . BASE_URL);}
      
      $name = $_GET['name'];
      $surname = $_GET['surname'];
      $dni = $_GET['dni'];
      $phone = $_GET['phone'];
      $mail = $_GET['mail'];
      
      // 'Add' data to the DB
      $this->user_model->addNewUserToDB($dni, $name, $surname, $phone, $mail);

      // Redirection
      header("Location: " . BASE_URL);
    }

    // Validates if every variable is setted and is not null or empty
    function addNewProperty(){
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
      $owner_dni = $_GET['propietario'];

      // 'Add' data to the DB
      $this->property_model->addNewPropertyToDB($title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $owner_dni);
      
      // Redirection
      header("Location: " . BASE_URL);
    }

    function showAddPropertyPage(){
      $owners = $this->user_model->getAllOwners();
      $this->view->showAddProperty($owners);
    }
    
    function showAddOwnerPage(){
      $this->view->showAddOwner();
    }

    function showOwnersPage(){
      $users = $this->user_model->getAllOwners();
      $this->view->displayAllOwners($users);
    }
    
    // Given a operation, the page will show properties that fulfill the 'operation' ('alquiler'/'venta')
    function showPropertiesOperation($operation){
      $properties = $this->property_model->getAllPropertiesWhereOperacionEquals($operation);
      $this->view->displayProperties($properties);
    }

    /* Delete a property, then display the homePage */
    function deleteProperty($id_property){
      $this->property_model->deleteProperty($id_property);
      $this->showHomePage();
    }
    
    function showEditProperty($id_property){
      $property_data = $this->property_model->getPropertyById($id_property);
      // If the data is "false"...
      if(empty($property_data)){$this->showHomePage();}
      
      // Get users to show dnis from a select -> option (HTML)
      $users = $this->user_model->getAllOwners();
      $this->view->editProperty($property_data, $users);
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
      $owner_dni = $_GET['propietario'];
      // 'edit' data in the DB
      $this->property_model->editPropertyDB($id, $title, $type, $operation, $description, $price, $square_meters, $rooms, $bathrooms, $allow_pets, $owner_dni);
      
      // Redirection
      header("Location: " . BASE_URL);
    }
    
    function showRegisterPage(){
      $this->view->showRegister();
    }

    function addNewAdmin(){
      // Validations
      $this->adminValidation();

      $username = $_GET['username'];
      $password = $_GET['password'];
      
      $this->admin_model->addAdmin($username, $password);

      // Redirection
      header("Location: " . BASE_URL);
    }

    function showLoguearsePage(){
      $this->view->showLogIn();
    }

    function verifyLogIn(){
      $this->adminValidation();

      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $ok = $this->admin_model->verifyLogIn($username, $password);
      if($ok){
        $this->view->goodCredentials();
      }else{
        $this->view->wrongCredentials();
      }
    }

    function adminValidation(){
      if(!isset($_POST['username']) || !isset($_POST['password'])){ header("Location: " . BASE_URL);}
      if(is_null($_POST['username']) || is_null($_POST['password'])){ header("Location: " . BASE_URL);}
      if(empty($_POST['username']) || empty($_POST['password'])){ header("Location: " . BASE_URL);}
    }
  }