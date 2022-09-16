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
    <?php include ('../vistas/encabezado.php');?>
    <!--Menu General-->
    <?php include ('../vistas/menu.php');?>
    <!--Contenido especifico-->
    <section id="Principal">
          <h2><b>RESGISTRO INGRESOS Y SALIDAS</b></h2>
            <img src="../images/chicajoven2.png" id="imagenizquierda">
            <img src="../images/videollamada2.png" id="imagenderecha">
            <h1>Pase el codigo de su carnet bajo el lector de codigos de barras</h1>
            <div class="centrarformulario">
                  
          <form action= "../includes/ingresar.php" method="post" class="blanco">
          <input type="hidden" name="pagina" value="pruebas.php"><br>
          LECTURA<input type="number" name="id_doc" value="" placeholder="CEDULA" autofocus><br>
          <input type="hidden" name="FechaHora" value="2022/07/06 12:50:00"><br>
          NOVEDAD<select name="Novedad">
                    <option value="In">Seleccione</option>
                    <option value="In">Entrada</option>
                    <option value="Out">Salida</option>
                    </select><br>
          <input type="hidden" name="id_portero" value=2><br>
          <input type="hidden" name="id_turno" value=3><br>
          <!--<input type="hidden" name="FechaHora" value="current_date"><br>-->
          <input type="submit" name="id" value="ENTRAR">
          <input type="reset" value="LIMPIAR">
          </form>
            <!--
            <table border="1" bgcolor="white" width="100%">
              <tr>
              <th width="15%">id</th>
              <th width="30%">Supervisor</th>
              <th width="40%">Seleccionar</th>
              </tr>
              <?php 
              /*$sql = "select * from tblsupervisor";
              $result = mysqli_query($con,$sql);
              while($fila = mysqli_fetch_object($result)){
              */?>
              <tr>
                <td><?php// echo $fila->id;?></td>
                <td><?php// echo $fila->usuario;?></td>
                <td>
                <a href="pruebas1.php?id=<?php// echo $fila->id;?>">Seleccionar</a></td>
              </tr>
              <?php// } ?>
              </table> -->
            </div>
    </section>           
    <!--Pie de pagina General-->
    <?php include ('../vistas/piepagina.php');?>
</body> 
</html>