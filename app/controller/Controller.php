<?php
  require_once './app/model/Model.php';
  require_once './app/view/View.php';

  class Controller{
    private $model;
    private $view;

    public function __construct(){
      $this->model = new Model();
      $this->view = new View();
    }

    function showHome(){
      $properties = $this->model->getAllProperties();
      $this->view->displayAllProperties($properties);
    }


    // Future functions to implement:
    // function displaySellingProperties()
    // function displayRentingProperties()
  }