<link rel="stylesheet" href="../components/login2/login.css">

<div class="text-container">
  <!-- div que contiene la fila??? -->
  <div class="row content h-100 text-center">
    <!-- columna izquierda -->
    <div class="sidetext col-2 h-auto">
    </div>
    <!-- columna central -->
    <div class="centertext col-8 text-left h-auto"> 
      <h1>Log IN</h1>
      <hr>  
    <!-- Formulario -->
      <form id="loginForm">
        <div class="mb-3">
          <label for="DNI" class="form-label">DNI</label>
          <input type="DNI" class="form-control" id="loginDNI" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="loginPassword">
        </div>
        <div class="mb-3">
          <button type="submit" id="loginAlumno" class="btn btn-primary">Soy Alumno</button>
        </div>
        <div class="mb-3">
          <button type="submit" id="loginProfesor" class="btn btn-primary">Soy Profesor</button>
        </div>
        </form>
    </div>
    
    <!-- columna derecha -->
    <div class="col-2 sidetext h-auto">
    </div>
  </div>
</div>
<script src="../components/login2/login.js"></script> 