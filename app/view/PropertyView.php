<?php
  require_once './libraries/smarty/libs/Smarty.class.php';

  class PropertyView{
    private $smarty;

    public function __construct(){
      $this->smarty = new Smarty();
    }

    function displayProperties($properties){
      $this->smarty->assign('properties', $properties);
      $this->smarty->display('pages/home.tpl');
    }

    function showProperty($property_and_user){
      $this->smarty->assign('property_and_user', $property_and_user);
      $this->smarty->display('pages/property.tpl');
    }
    
    function showAddProperty($users){
      $this->smarty->assign('formHeader', "Nueva propiedad");
      $this->smarty->assign('buttonMessage', "Agregar");
      $this->smarty->assign('formAction', "crearNuevaPropiedad");

      $this->smarty->assign('property', null);
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/addProperty.tpl');
    }

    // Given a data array, displays a form with the data in the array
    function editProperty($property_data, $users){
      $this->smarty->assign('formHeader', "Editar propiedad");
      $this->smarty->assign('buttonMessage', "Editar");
      $this->smarty->assign('formAction', "editarPropiedad");
      
      $this->smarty->assign('property', $property_data);
      $this->smarty->assign('users', $users);
      $this->smarty->display('pages/editProperty.tpl');
    }
  }