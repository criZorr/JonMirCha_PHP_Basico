<?php
include("conexion.php");
$consulta = "SELECT email FROM contactos ORDER BY email";
$ejecutar_consulta = $conexion->query($consulta);
while ($registro = $ejecutar_consulta->fetch_assoc()) {
    echo "<option value='" . $registro["email"] . "'";
    if ($_GET["contacto_slc"] == $registro["email"]) {
        echo " selected";
    }
    echo ">" . $registro["email"] . "</option>";
}
// $conexion->close();
?>