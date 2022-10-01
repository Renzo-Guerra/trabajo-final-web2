<?php

  class Model{
    
    private $db;

    public function __construct(){
      $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tpweb;charset=utf8', 'root', '');
    }

    // Obtains all the properties from 'tb_propiedad'
    function getAllProperties(){
      $query = $this->db->prepare("SELECT * FROM tb_propiedad");
      $query->execute();
      $properties = $query->fetchAll(PDO::FETCH_OBJ);

      return $properties;
    }
  }