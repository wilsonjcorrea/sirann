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
          <h2><b>ASIGNAR TURNOS</b></h2>
            <h1>Seleccione un Supervisor, para listar los empleados a modificar turnos <br>
                El sistema solo le permite modificar los turnos correspondientes al usuario autenticado.  </h1>
                <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
                <img src="../images/construction_tool2.png" id="imagenderecha">
                <div class="centrarformulario">
            <form action= "asignarturno1.php" method="post" class="blanco">  
              Turno:<select name="mi_select">
                  <option value='mi_select'>Seleccione</option>
                  <?php
                  $resultado = mysqli_query($con,"SELECT * FROM tblsupervisor");
                  while ($fila = $resultado->fetch_assoc()):
                      $id = $fila['id'];
                      $usuario = $fila['usuario'];
                      echo "<option value=$id>$usuario</option>";
                  endwhile;
              ?>
              <input type="submit" name="id" value="SELECCIONAR">
            </form>
            </div>
    </section>           
    <!--Pie de pagina General-->
    <?php include ('piepagina.php');?>
</body> 
</html>