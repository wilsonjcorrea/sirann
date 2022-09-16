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
    <!--Encabezado General-->
    <?php include ('encabezado.php');?>
    <!--Menu General-->
    <?php include ('menu.php');?>
    <!--Contenido especifico-->
    <?php 
        //informacion que viene de pagina anterior
        $fini=$_POST['FIni'];
        $ffin=$_POST['FFin'];
        //se calcula fecha siguiente dia indicado en pagina anterior por el usuario, como rango de fecha de busquedas. 
        $Ffin=date("Y-m-d H:m:s",strtotime($ffin."+ 1 days"));
        //Se crean consultas a la base de datos con las variables anteriores
        $sql1 = "SELECT * FROM tblinforme 
        WHERE F_Ini between '$fini' AND '$Ffin'";
        $result1 = mysqli_query($con,$sql1);
        $filas=mysqli_num_rows($result1);
    ?>
    <section id="Principal">
          <h2><b>INFORME REPORTE NOVEDADES</b></h2>
            <h1>Se lista el reporte de novedades, entre las fechas indicadas.</h1>
            <div class="formpage">
            <!-- Accion del formulario al presioniar boton al final -->
            <form action="../includes/exportExcel1.php" method="POST">
            <!-- Entrada oculta del formulario, utilizada para switch de procesos -->  
            <input type="hidden" name="FIni" value="<?php echo $fini;?>">
            <input type="hidden" name="FFin" value="<?php echo $ffin;?>">
            <input type="hidden" name="pagina" value="informe1.php">
            <!-- Creacion de Tabla -->
            <table border="1" bgcolor="white" width="100%">
                  <tr>
                    <th width="3%">Doc Identidad</th>
                    <th width="3%">HED</th>
                    <th width="3%">HEN</th>
                    <th width="3%">RN</th>
                    <th width="3%">RD</th>
                    <th width="3%">HEDD</th>
                    <th width="3%">HEND</th>
                    <th width="3%">RND</th>
                    <th width="5%">Autorizo</th>
                    <th width="7%">FechaAuto</th>
                    <th width="20%">Observaciones</th>
                  </tr>
                  <?php while ($fila = $result1->fetch_assoc()):
                  ?>
                  <tr>
                  <td><?php $doc = $fila['id_doc'];
                      echo $doc;?>
                  </td>
                  <td><?php $hed = $fila['HED'];
                      echo $hed;?>
                  </td>
                  <td><?php $hen = $fila['HEN'];
                      echo $hen;?>
                  </td>
                  <td><?php $rn = $fila['RN'];
                      echo $rn;?>
                  </td>
                  <td><?php $rd = $fila['RD'];
                      echo $rd;?>
                  </td>
                  <td><?php $hedd = $fila['HEDD'];
                      echo $hedd;?>
                  </td>
                  <td><?php $hend = $fila['HEND'];
                      echo $hend;?>
                  </td>
                  <td><?php $rnd = $fila['RND'];
                      echo $rnd;?>
                  </td>
                  <td><?php $aut = $fila['id_usuario'];
                      echo $aut;?>
                  </td>
                  <td><?php $faut = $fila['FechaHora'];
                      echo $faut;?>
                  </td>
                  <td><?php $observ = $fila['Observacion'];
                      echo $observ;?>
                  </td>
                  </tr>
                  <?php endwhile ?>
            </table>
            <!-- Botones de ejecucion siguiente proceso -->
            <input type="hidden" name="totalhed" value="<?php echo $totalhed;?>">
            <input type="hidden" name="totalhen" value="<?php echo $totalhen;?>">
            <input type="hidden" name="totalrn" value="<?php echo $totalrn;?>">
            <input type="hidden" name="totalrd" value="<?php echo $totalrd;?>"> 
            <input type="hidden" name="totalhedd" value="<?php echo $totalhedd;?>">
            <input type="hidden" name="totalhend" value="<?php echo $totalhend;?>">
            <input type="hidden" name="totalrnd" value="<?php echo $totalrnd;?>">            
            <button type="button" onclick="location.href='informe.php'">VOLVER</button>
            <input type="submit" name="Export" value="Exportar">
            </form>
          </div>
    </section>
    <!--Pie de pagina General-->
    <?php
    if($filas<14){
      include ('piepagina.php');
    }
    else{
      mysqli_close($con);
    }
    ?>
</body> 
</html>