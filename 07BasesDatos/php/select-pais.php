<?php
include("conexion.php");
$consulta = "SELECT * FROM pais ORDER BY pais";
$ejecutar_consulta = $conexion->query($consulta);

while ($registro = $ejecutar_consulta->fetch_assoc()) {
    echo "<option value='" . $registro["pais"] . "'>" . $registro["pais"] . "</option>";
}
?>