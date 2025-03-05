<link rel="stylesheet" href="../components/register/register.css">

<div class="text-container">
  <!-- div que contiene la fila??? -->
  <div class="row content h-100 text-center">
    <!-- columna izquierda -->
    <div class="sidetext col-2 h-auto">
    </div>
    <!-- columna central -->
    <div class="centertext col-8 text-left h-auto"> 
      <h1>Registro</h1>
      <hr>  
    <!-- Formulario -->
      <form id="registerForm">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="nombre" class="form-control" id="registerNombre" aria-describedby="nombreHelp">
        </div>
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido</label>
          <input type="apellido" class="form-control" id="registerApellido" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="DNI" class="form-label">DNI</label>
          <input type="DNI" class="form-control" id="registerDNI" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="registerPassword">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio" value="Alumno" id="registerAlumno">
          <label class="form-check-label" for="registerAlumno">
            Alumno
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="radio" value="Profesor" id="registerProfesor" checked>
          <label class="form-check-label" for="registerProfesor">
            Profesor
          </label>
        </div>
        <div class="mb-3">
          <button type="submit" id="registroEnviar" class="btn btn-primary">Enviar</button>
        </div>
        </form>
    </div>
    
    <!-- columna derecha -->
    <div class="col-2 sidetext h-auto">
    </div>
  </div>
</div>
<script src="../components/register/register.js"></script> 