<link rel="stylesheet" href="/components/profesor/textcontainer.css">

<div class="text-container">
  <!-- div que contiene la fila??? -->
  <div class="row content h-100 text-center">
    <!-- columna izquierda -->
    <div class="sidetext col-2 h-auto">
    </div>
    <!-- columna central -->
    <div class="centertext col-8 text-left h-auto"> 
      <div class="card shadow p-4">
            <h3 class="text-secondary">Lista de asignaturas</h3>
            <ul id="asignaturasContainer" class="list-group p-4">
                <!-- Asignaturas dinámicamente cargadas aquí -->
            </ul>
      </div>
    </div>
    <!-- columna derecha -->
    <div class="col-2 sidetext h-auto">
    </div>
  </div>
  <script src="/components/profesor/asignaturas.js"></script>
  <script>loadAsignaturas();</script> 
</div>