<?php 

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
  
  $choosen_url = 'home';

  if(!empty($_GET['url'])){
    $choosen_url = $_GET['url'];
  }

  $params = explode('/', $choosen_url);
  
  switch ($params[0]) {
    
    default: echo "404 not found"; break;
  }