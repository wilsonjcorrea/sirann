<!DOCTYPE html:5>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIRANN FuSoft®</title>
    <meta name="description" content="Sistema Integrado de Registro, Accesos, Novedades y Nomina, by FuSoft®">
    <meta name="keywords" content="Registro Accesos, Novedades, Nomina, FuSoft®">
</head>
<body>
    <?php
      $con = mysqli_connect('localhost','root','','bd_sirann');
    ?>
    <!--Encabezado General-->
    <?php include ('encabezado.php');?>
    <!--Menu General-->
    <?php include ('menu.php');?>
    <!--Contenido especifico-->
    <section id="Principal">
          <h2><b>CREAR USUARIOS GESTORES</b></h2>
          <h3>Seleccione el tipo de usuario gestor a crear.<br>
          Se sugie utilizar la plantilla nombre.apellido.</h3><br>
            <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
            <img src="../images/construction_tool2.png" id="imagenderecha">
            <div class="centrarformulario">
            <form action= "../includes/ingresar.php" method="post" class="blanco">
            <input type="hidden" name="pagina" value="usuariogestor.php">
            Tipo Usuario:<select name="tipo">
                <option value="0">Seleccione</option>
                <option value="sql">Administrador</option>
                <option value="sql1">Supervisor</option>
                <option value="sql2">Portero</option>
            </select><br>
            Usuario:<input type="text" name="usuario" placeholder="nombre.apellido"><br>
            Nombre:<input type="password" name="contrasena" placeholder="*C0ntras3ña*"><br>
            <input type="submit" name="enviar" value="CREAR">
            <input type="reset" value="LIMPIAR">
        </form>
    </div>
    </section>
    <!--Pie de pagina General-->
    <?php include ('piepagina.php');?>
</body> 
</html>


