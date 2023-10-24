<?php
$conexion = mysqli_connect("localhost", "root", "", "mis_contactos") or die("No se conectó a la BD");

echo "Conectado a la BD <b>mis_contactos</b>";
echo "<h1>Las 4 operaciones básica a una BD</h1>";

echo "<h2>1.- Inserción de datos</h2>";
//INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_campos)

$consulta = "INSERT INTO contactos(email, nombre, sexo, nacimiento, telefono, pais, imagen) VALUES ('christophermjk@hotmail.com','Christopher Morales','M','2000-02-25','593984234613','Colombia','crizorr.png')";

try {
    $ejecutar_consulta = mysqli_query($conexion, $consulta);
    echo "Se han insertado los datos ✅<br>";
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
}


echo "<h2>2.- Eliminación de datos</h2>";
//DELETE FROM nombre_tabla WHERE campo = valor

$consulta = "DELETE FROM contactos WHERE email = 'christopher.mjk@gmail.com'";

$ejecutar_consulta = mysqli_query($conexion, $consulta);
echo "Datos eliminados 😢<br>";


echo "<h2>3.- Modificación de datos</h2>";
//UPDATE nombre_tabla SET nombre_campo = valor_campo, n...

$consulta = "UPDATE contactos SET email = 'criZorr25@gmail.com', nombre = 'criZorr', imagen = 'crizorr.svg' WHERE email = 'christopher25.mjk@gmail.com'";

$ejecutar_consulta = mysqli_query($conexion, $consulta);
echo "Datos modificados ✅";

echo "<h2>4.- Consulta de datos (Búsqueda)</h2>";
// SELECT * FROM nombre_tabla WHERE campo = valor

$consulta = "SELECT * FROM contactos";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

echo "<h3>Consulta que trae todos los registros de la tabla</h3>";

while ($registro = mysqli_fetch_array($ejecutar_consulta)) {
    echo $registro["email"] . "---";
    echo $registro["nombre"] . "---";
    echo $registro["sexo"] . "---";
    echo $registro["nacimiento"] . "---";
    echo $registro["telefono"] . "---";
    echo $registro["pais"] . "---";
    echo $registro["imagen"] . "<br>";
}

$consulta = "SELECT * FROM contactos WHERE nombre = 'criZorr'";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

echo "<h3>Consulta que trae un registro de la tabla (criZorr)</h3>";

while ($registro = mysqli_fetch_array($ejecutar_consulta)) {
    echo $registro["email"] . "---";
    echo $registro["nombre"] . "---";
    echo $registro["sexo"] . "---";
    echo $registro["nacimiento"] . "---";
    echo $registro["telefono"] . "---";
    echo $registro["pais"] . "---";
    echo $registro["imagen"] . "<br>";
}

$consulta = "SELECT * FROM contactos WHERE pais = 'Ecuador' AND telefono='593984234613'";

$ejecutar_consulta = mysqli_query($conexion, $consulta);

echo "<h3>Consulta que trae los registros de la tabla que coinciden con los valores (Ecuador y 593984234613)</h3>";

while ($registro = mysqli_fetch_array($ejecutar_consulta)) {
    echo $registro["email"] . "---";
    echo $registro["nombre"] . "---";
    echo $registro["sexo"] . "---";
    echo $registro["nacimiento"] . "---";
    echo $registro["telefono"] . "---";
    echo $registro["pais"] . "---";
    echo $registro["imagen"] . "<br>";
}

mysqli_close($conexion);
echo "<h4>Conexión cerrada</h4>";

?>