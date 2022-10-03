<!DOCTYPE html>
<html lang="es">
<head>
  <base href="{BASE_URL}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
  <title>Inmobiliaria Lattour</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="inicio">
      <img src="assets/img/logo2.png" width="30" height="24" class="d-inline-block align-text-top">Lattour
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="inicio">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="venta">Venta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alquiler">Alquiler</a>
        </li>
        {* This last <li></li> will only be seen by the admin *}
  
        <li class="nav-item mx-5">
          <ul class="navbar-nav">
            <li><a class="nav-link" href="agregarPropiedad">Agregar propiedad</a></li>
            <li><a class="nav-link" href="agregarPropietario">Agregar propietario</a></li>
            <li><a class="nav-link" href="propietarios">Ver propietarios</a></li>
          </ul>
        </li>
        {* This last <li></li> will only be seen by the admin *}
        <li class="nav-item">
          <ul class="navbar-nav">
            <li><a class="nav-link" href="">Iniciar sesion</a></li>
            <li><a class="nav-link" href="registrarse">Registrarse</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </nav>
</header>
