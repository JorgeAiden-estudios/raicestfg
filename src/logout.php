<?php
session_start();


setcookie("tipoUsuario", "", time() - 3600, "/");
setcookie("user_id", "", time() - 3600, "/");



echo
"<script>
    localStorage.clear();
    alert('Sesión cerrada correctamente');
    window.location.replace(\"/src/landing.php\");  
</script>";

session_destroy();
//Done 21 Ene 2025
?>
