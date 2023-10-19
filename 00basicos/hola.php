<?php
//comentario de una sola linea
/*
Esto es
un comentario
multilinea
*/
//Imprimir en pantalla
echo "Hola PHP";
echo "<br />Hola, criZorr,<br />sigue <b>aprendiendo PHP</b>";

//Variables
$nombre = "criZorr";
$Nombre = "Christopher";

//Concatenación de cadenas y variables
echo $nombre."&nbsp".$Nombre;
echo "<br>";

$num1 = 5;
$num2 = 77;
$suma = $num1 + $num2;
echo $suma;

echo "<br>La variable \$suma tiene el valor de $suma<br>";

$modulo = $num2 % 2;

if ($modulo == 0) {
    echo "El n&uacute;mero es Par";
}else{
    echo "El n&uacute;mero es Impar";
}
echo "<br>";

for ($i=0; $i <= 10; $i++) { 
    echo $i."<br>";
}
?>