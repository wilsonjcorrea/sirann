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
        $doc= $_POST['DOC'];
        $fini=$_POST['FIni'];
        $ffin=$_POST['FFin'];
        
        //se calcula fecha siguiente dia indicado en pagina anterior por el usuario, como rango de fecha de busquedas. 
        $Ffin=date("Y-m-d H:m:s",strtotime($ffin."+ 1 days"));
        //Se crean consultas a la base de datos con las variables anteriores
        $sql1 = "SELECT * FROM tblregistro 
        WHERE id_doc='$doc' AND FechaHora between '$fini' AND '$Ffin' AND Novedad ='In'";
        $sql2 = "SELECT * FROM tblregistro 
        WHERE id_doc='$doc' AND FechaHora between '$fini' AND '$Ffin' AND Novedad ='Out'";
        $result1 = mysqli_query($con,$sql1);
        $result2 = mysqli_query($con,$sql2);
        $filas=mysqli_num_rows($result1);
    ?>
    <section id="Principal">
          <h2><b>CONSULTA REGISTROS</b></h2>
            <h1>Revise, realice observaciones y autorice, los registros de los usuarios listados segun los filtros suministrados. </h1>
            <div class="formpage">
            <!-- Accion del formulario al presioniar boton al final -->
            <form action="../includes/ingresar.php" method="POST">
            <!-- Entrada oculta del formulario, utilizada para switch de procesos -->  
            <input type="hidden" name="DOC" value="<?php echo $doc;?>">
            <input type="hidden" name="FIni" value="<?php echo $fini;?>">
            <input type="hidden" name="FFin" value="<?php echo $ffin;?>">
            <input type="hidden" name="usuario" value="<?php echo $user;?>">
            <input type="hidden" name="pagina" value="consultareg2.php">
            <!-- Creacion de Tabla -->
            <table border="1" bgcolor="white" width="100%">
                  <tr>
                    <th width="5%">Doc Identidad</th>
                    <th width="5%">HED</th>
                    <th width="5%">HEN</th>
                    <th width="5%">RN</th>
                    <th width="5%">RD</th>
                    <th width="5%">HEDD</th>
                    <th width="5%">HEND</th>
                    <th width="5%">RND</th>
                    <th width="5%">Observaciones</th>
                  </tr>
                  <tr>
                  <td><input type="number" width= '10px' value="<?php echo $doc;?>" name="DOC"></td>
                  <td><input type="number" value="<?php echo $totalhed;?>" name="thed"></td>
                  <td><input type="number" value="<?php echo $totalhen;?>" name="then"></td>
                  <td><input type="number" value="<?php echo $totalrn;?>" name="trn"></td>
                  <td><input type="number" value="<?php echo $totalrd;?>" name="trd"></td>
                  <td><input type="number" value="<?php echo $totalhedd;?>" name="thedd"></td>
                  <td><input type="number" value="<?php echo $totalhend;?>" name="thend"></td>
                  <td><input type="number" value="<?php echo $totalrnd;?>" name="trnd"></td>
                  <td><input type="text" name="Observacion" placeholder="Ingrese_Observaciones"></td>
                  </tr>
                
            </table>
            <!-- Botones de ejecucion siguiente proceso -->
            <input type="hidden" name="totalhed" value="<?php echo $totalhed;?>">
            <button type="button" onclick="location.href='../vistas/consultareg.php'">VOLVER</button>
            <input type="submit" name="Guardar" value="Guardar">
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