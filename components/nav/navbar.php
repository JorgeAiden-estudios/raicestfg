<!-- Imports (absolute pathing from /) -->
<link rel="stylesheet" href="../components/nav/navbar.css">

<!-- Component -->
<nav class="navbar navbar-expand-sm navbar-dark sticky-top">
  <div class="container-fluid">
  <!-- Logo -->  
  <a class="navbar-brand" href="javascript:topFunction();"><img class="logo-img" src="../assets/logoRAICES_transparente.png" alt="Logo"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <!-- Lo que muestra si alumno -->  
      <div id="navbar-alumno" class="navbar-alumno navbar-nav me-auto">
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../src/alumno.php');">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../src/alumnoFaltas.php');">Mis faltas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../src/alumnoProfesor.php');">Mis profesores</a>
        </li>
    </ul>
</div>
      <!-- Lo que muestra si profesor -->
      <div id="navbar-profesor" class="navbar-nav me-auto">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../src/profesor.php');">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../src/misAsignaturas.php');">Mis asignaturas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../src/misAlumnos.php');">Mis alumnos</a>
          </li>
        </ul>
      </div>
      <!-- Lo que muestra si invitado -->
      <div id="navbar-invitado" class="navbar-alumno navbar-nav me-auto">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="javascript:goToNewPage('../index.php');">Inicio</a>
          </li>
        </ul>
      </div>
      <!-- AUTH SECTION -->
      <div class="d-flex justified" id="authSection">
        <button id="registro" onclick="goToNewPage('../src/register.php')" class="btn btn-primary me-2" type="button">Registrarse</button>
		    <button id="login" onclick="goToNewPage('../src/login2.php')" class="btn btn-primary" type="button">Log In</button>
		  </div>
      <!-- LOGOUT SECTION -->
      <div class="d-flex justified" id="logoutSection">
        <button hidden id="logoutButton" onclick="goToNewPage('../src/logout.php')" class="btn btn-primary me-2" type="button">Cerrar Sesión</button>
	  	</div>
    
    </div>
  </div>
</nav>

<!-- JS imports -->
<script src="../components/nav/navbar.js"></script> 
<?php 

if(isset($_COOKIE["tipoUsuario"]))
{
// session IS started
$tipo_usuario = $_COOKIE["tipoUsuario"];
}
else $tipo_usuario = "invitado";
print "<script type=\"text/javascript\"> navbarChanges(\"{$tipo_usuario}\"); </script>";
?>
