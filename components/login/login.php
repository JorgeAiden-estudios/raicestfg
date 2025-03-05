<link rel="stylesheet" href="../components/login/login.css">

<div class="container-fluid text-center h-auto">    
  <div class="row content">
    <div class="col-sm-2 sidenav h-auto">
      
    </div>
    
    <div class="col-sm-8 text-left h-auto"> 
    
          <div class="form-container">
        <h2>Regístrate</h2>
        
        <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form id="loginForm" name="Formulario_Iden_usu" method="post">
    <fieldset>
        <div class="camposLogin">
            <input id="DNI" type="text" name="DNI" placeholder="DNI" size="15" maxlength="25" value="">
        </div>
        <div class="camposLogin" id="c_pass">
            <input id="CLAVE_P" type="password" name="CLAVE_P" placeholder="Contraseña" size="15" maxlength="15">
        </div>
        <div class="camposLogin">
            <label><input type="radio" name="role" value="alumno" required> Alumno</label>
            <label><input type="radio" name="role" value="profesor" required> Profesor</label>
        </div>
        <div class="checkLogin">
            <input class="filled-in" id="VER_CLAVE" type="checkbox" name="VER_CLAVE">&nbsp;
            <label for="VER_CLAVE" title="Ver clave" style="margin-bottom: 3%;"><span></span>Mostrar contraseña</label>
        </div>
        <div class="boton_right">
            <input name="Entrar" id="Entrar" value="Entrar" class="btn" alt="Entrar" title="Entrar" type="submit">
        </div>
        <div id="MENSAJE"></div>
    </fieldset>
</form>
   

    </div>
    <div class="col-sm-2 sidenav h-auto">
      <div class="well">
      


      </div>
    </div>
  </div>
</div>