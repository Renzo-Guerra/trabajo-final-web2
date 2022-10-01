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
    case 'agregarPropietario': $controller->showAddOwnerPage(); break;
    case 'crearNuevoPropietario': $controller->addNewUser(); break;
    case 'agregarPropiedad': $controller->showAddPropertyPage(); break;
    case 'crearNuevaPropiedad': $controller->addNewProperty(); break;
    case 'propietarios': $controller->showOwnersPage(); break;
    case 'venta': $controller->showPropertiesOperation('venta'); break;
    case 'alquiler': $controller->showPropertiesOperation('alquiler'); break;

    default: echo "404 not found"; break;
  }