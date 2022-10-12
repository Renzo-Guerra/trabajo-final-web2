<?php 
  require_once './app/controller/PropertyController.php';
  require_once './app/controller/RegisterController.php';
  require_once './app/controller/UserController.php';

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
  
  $choosen_url = 'inicio';

  if(!empty($_GET['url'])){
    $choosen_url = $_GET['url'];
  }

  $params = explode('/', $choosen_url);
  
  $property_controller = new PropertyController();
  $register_controller = new RegisterController();
  $user_controller = new UserController();

  switch ($params[0]) {
    case 'inicio': $property_controller->showHomePage(); break;
    case 'agregarPropietario': $user_controller->showAddUserPage(); break;
    case 'crearNuevoPropietario': $user_controller->addNewUser(); break;
    case 'agregarPropiedad': $property_controller->showAddPropertyPage(); break;
    case 'crearNuevaPropiedad': $property_controller->addNewProperty(); break;
    case 'propietarios': $user_controller->showUsersPage(); break;
    case 'venta': $property_controller->showPropertiesOperation('venta'); break;
    case 'alquiler': $property_controller->showPropertiesOperation('alquiler'); break;
    case 'eliminar': {
      // Explode the url to get the property id
      $subparams = explode('/', $_GET['url']);
      // If the id is not set
      if(!isset($subparams[1])){header("Location: " . BASE_URL); break;}

      $property_controller->deleteProperty($subparams[1]); break;
    }
    case 'editar': {
      // Explode the url to get the property id
      $subparams = explode('/', $_GET['url']);
      // If the id is not set
      if(!isset($subparams[1])){header("Location: " . BASE_URL); break;}
      $property_controller->showEditProperty($subparams[1]); break;
    }
    case 'editarPropiedad': $property_controller->editProperty(); break;
    case 'loguearse': $register_controller->showLoguearsePage(); break;
    case 'comprobarLogueoAdmin': $register_controller->verifyLogIn(); break;
    case 'propiedad':{ 
      // Explode the url to get the property id
      $subparams = explode('/', $_GET['url']);
      // [0] = "propiedad" [1] = :id
      if(!isset($subparams[1])){header("Location: " . BASE_URL); break;} 
      $property_controller->showProperty($subparams[1]);
      break; 
    }
    case 'eliminarUsuario': {
      // Explode the url to get the user dni
      $subparams = explode('/', $_GET['url']);
      // If the id is not set
      if(!isset($subparams[1])){header("Location: " . BASE_URL); break;}
      $user_controller->deleteUser($subparams[1]); break;
    }
    case 'editarUsuario': {
      // Explode the url to get the user dni
      $subparams = explode('/', $_GET['url']);
      // If the id is not set
      if(!isset($subparams[1])){header("Location: " . BASE_URL); break;}
      $user_controller->showEditUserPage($subparams[1]); break;
    }
    case 'editarUsuarioDB': $user_controller->editUserDB(); break;
    case 'desloguearse': $register_controller->logOut(); break;
    default: echo "404 not found"; break;
  }