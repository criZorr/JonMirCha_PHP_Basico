<!DOCTYPE html>
<html lang="es">
<head>
    <title>Envío de datos por GET y POST</title>
    <meta charset="utf-8" />
</head>
<body>
    <hgroup><h1>Formulario enviado por el método GET</h1></hgroup>
    <form name="envia-get_frm" action="envia-datos.php" method="get" enctype="application/x-www-form-urlencoded">
        <label>Ingresa tu nombre:</label>
        <input type="text" name="nombre_txt" />
        <br><br>
        <label>Ingresa tu contraseña:</label>
        <input type="password" name="password_txt" />
        <br><br>
        <input type="submit" name="enviar_btn" value="Envía-GET" />
    </form>

    <hgroup><h1>Formulario enviado por el método POST</h1></hgroup>
    <form name="envia-post_frm" action="envia-datos.php" method="post" enctype="application/x-www-form-urlencoded">
        <label>Ingresa tu nombre:</label>
        <input type="text" name="nombre_txt" />
        <br><br>
        <label>Ingresa tu contraseña:</label>
        <input type="password" name="password_txt" />
        <br><br>
        <input type="submit" name="enviar_btn" value="Envía-POST" />
    </form>
</body>
</html>