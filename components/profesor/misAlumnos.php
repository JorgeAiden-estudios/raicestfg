<link rel="stylesheet" href="/components/textcontainer/textcontainer.css">

<div class="text-container">
  <!-- div que contiene la fila??? -->
  <div class="row content h-100 text-center">
    <!-- columna izquierda -->
    <div class="sidetext col-2 h-auto">
    </div>
    <!-- columna central -->
    <div class="centertext col-8 text-left h-auto"> 
      <div class="card shadow row p-4">
          <h3 class="text-secondary">Lista de alumnos</h3>
          <div id="alumnosContainer" class="list-group p-4 d-flex flex-wrap flex-row">
              <!-- Asignaturas dinámicamente cargadas aquí -->
              <div class="card m-4" style="width: 18rem;">
              <img class="card-img-top" src="../assets/usuario.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Alumno 0</h5>
                <p class="card-text">Ejemplo de faltas.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
              </div>

              <div class="card m-4" style="width: 18rem;">
              <img class="card-img-top" src="../assets/usuario.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Alumno 1</h5>
                <p class="card-text">O descripcion.</p>
                <a href="#" class="btn btn-primary">Añadir</a>
              </div>
              </div>

              <div class="card m-4" style="width: 18rem;">
              <img class="card-img-top" src="../assets/usuario.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Alumno 2</h5>
                <p class="card-text">O cualquier otra cosa.</p>
                <a href="#" class="btn btn-primary">Añadir</a>
              </div>
              </div>

              <div class="card m-4" style="width: 18rem;">
              <img class="card-img-top" src="../assets/usuario.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Alumno 3</h5>
                <p class="card-text">Ejemplo de alumno 1.</p>
                <a href="#" class="btn btn-primary">Añadir</a>
              </div>
              </div>
          </div>
      </div>
    </div>
    <!-- columna derecha -->
    <div class="col-2 sidetext h-auto">
    </div>

  </div>
</div>