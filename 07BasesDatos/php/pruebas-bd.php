<?php
//Pasos para conectarse a una BD MySQL con PHP
//1.- Conectarme a la BD
$conexion = mysqli_connect("localhost", "root", "", "mis_contactos") or die ("No se pudo conectar al servidor");

echo "Estoy conectado a SQL <br>";

//2.- Consulta
$consulta = "SELECT * FROM pais";

//3.- Ejecutar consulta
// $ejecutar_consulta = $conexion->query($consulta) or die ("No se ejecutó la consulta en la BD");
$ejecutar_consulta = mysqli_query($conexion, $consulta) or die ("No se ejecutó la consulta en la BD");

echo "Se ejecutó la consulta SQL <br>";

//4.- Mostar el resultado de la consutla dentro de un ciclo
while ($registro = mysqli_fetch_array($ejecutar_consulta)) {
    echo $registro["id_pais"]." - ".$registro["pais"]."<br>";
}

//5.- Cerrar conexión a la BD
mysqli_close($conexion) or die ("Ocurrió un error al cerrar la conexión a la BD");

echo "Conexión cerrada";

?>