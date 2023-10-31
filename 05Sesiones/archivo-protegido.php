<?php include("sesion.php"); ?>
Bienvenido:
<?php echo $_SESSION["usuario"]; ?>
<br><br>
Estás en un página segura con sesiones en PHP.
<br><br>
<a href="archivo-protegido2.php">Ir a otra página segura</a>
<br><br>
<a href="salir.php">Salir</a>