<?php 
  require_once './app/controller/Controller.php';

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
  
  $choosen_url = 'inicio';

  if(!empty($_GET['url'])){
    $choosen_url = $_GET['url'];
  }

  $params = explode('/', $choosen_url);
  
  $controller = new Controller();

  switch ($params[0]) {
    case 'inicio': $controller->showHomePage(); break;
    case 'agregarPropietario': $controller->showAddUserPage(); break;
    case 'crearNuevoPropietario': $controller->addNewUser(); break;
    case 'agregarPropiedad': $controller->showAddPropertyPage(); break;
    case 'crearNuevaPropiedad': $controller->addNewProperty(); break;
    case 'propietarios': $controller->showUsersPage(); break;
    case 'venta': $controller->showPropertiesOperation('venta'); break;
    case 'alquiler': $controller->showPropertiesOperation('alquiler'); break;
    case 'eliminar': {
      // Explode the url to get the property id
      $subparams = explode('/', $_GET['url']);
      // If the id is not set
      if(!isset($subparams[1])){$controller->showHomePage(); break;}

      $controller->deleteProperty($subparams[1]); break;
    }
    case 'editar': {
      // Explode the url to get the property id
      $subparams = explode('/', $_GET['url']);
      // If the id is not set
      if(!isset($subparams[1])){$controller->showHomePage(); break;}
      $controller->showEditProperty($subparams[1]); break;
    }
    case 'editarPropiedad': $controller->editProperty(); break;
    case 'registrarse': $controller->showRegisterPage(); break; 
    case 'crearNuevoAdmin': $controller->addNewAdmin(); break;
    case 'loguearse': $controller->showLoguearsePage(); break;
    case 'comprobarLogueoAdmin': $controller->verifyLogIn(); break;
    default: echo "404 not found"; break;
  }