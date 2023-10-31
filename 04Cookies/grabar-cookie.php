<?php
setcookie("idioma_solicitado",$_GET["idioma"],time()+86400,"/");
header("Location: usar-cookie.php")

?>