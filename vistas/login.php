<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGUIN FuSoft®</title>
    <meta name="description" content="Sistema Integrado de Registro, Accesos, Novedades y Nomina, by FuSoft®">
    <meta name="keywords" content="Registro Accesos, Novedades, Nomina, FuSoft®">
</head>
<body>
     <!--Encabezado General-->
    <link rel="stylesheet" href="plantilla.css">
    <div id="Encabezado">
         <header id="enacabezado">
         <img id="logo-FuSoft"src="images/FuSoft2.png">
         <img id="logo-Neuro"src="images/NEUROFICICON3.png">
         <h1><b>S I R A N N</b></h1>
         <h2>Sistema Integrado de Registro, Accesos, Novedades y Nomina, by FuSoft®</h2>
         </header>
     </div>
    <!--Contenido especifico-->
    <div class="centrarformulario">
    <form action="" method="post">
    <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
        <h2>LOGIN FuSoft®</h2>
        <input type="text" placeholder="&#128272; Usuario" name="usuario">
        <input type="password" placeholder="&#128272; Contraseña" name="contrasena">
        <input type="submit" value="Ingresar">
    </form>
    </div>
</body>
</html>