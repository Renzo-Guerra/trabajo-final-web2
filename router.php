<?php 
  require_once './app/controller/Controller.php';

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
  
  $choosen_url = 'home';

  if(!empty($_GET['url'])){
    $choosen_url = $_GET['url'];
  }

  $params = explode('/', $choosen_url);
  
  $controller = new Controller();

  switch ($params[0]) {
    case 'home': $controller->showHomePage(); break;
    case 'addOwner': $controller->showAddOwnerPage(); break;
    case 'createNewUser': $controller->addNewUser(); break;
    case 'addProperty': $controller->showAddPropertyPage(); break;
    case 'createNewProperty': $controller->addNewProperty(); break;
    case 'owners': $controller->showOwnersPage(); break;
    case 'selling': $controller->showPropertiesOperation('venta'); break;
    case 'renting': $controller->showPropertiesOperation('alquiler'); break;

    default: echo "404 not found"; break;
  }