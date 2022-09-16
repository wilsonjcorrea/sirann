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
            <form action="../includes/exportExcel.php" method="POST">
            <!-- Entrada oculta del formulario, utilizada para switch de procesos -->  
            <input type="hidden" name="DOC" value="<?php echo $doc;?>">
            <input type="hidden" name="FIni" value="<?php echo $fini;?>">
            <input type="hidden" name="FFin" value="<?php echo $ffin;?>">
            <input type="hidden" name="pagina" value="consultareg1.php">
            <!-- Creacion de Tabla -->
            <table border="1" bgcolor="white" width="100%">
                  <tr>
                    <th width="5%">Doc Identidad</th>
                    <th width="5%">Fecha</th>
                    <th width="3%">Dia</th>
                    <th width="5%">Entra</th>
                    <th width="5%">Sale</th>
                    <th width="3%">Horas</th>
                    <th width="3%">HED</th>
                    <th width="3%">HEN</th>
                    <th width="3%">RN</th>
                    <th width="3%">RD</th>
                    <th width="3%">HEDD</th>
                    <th width="3%">HEND</th>
                    <th width="3%">RND</th>
                  </tr>
            <!-- llamada de archivo con el proceso de la informacion  -->
            <?php include("../includes/calculohoras.php")?>      
            </table>
            <!-- Botones de ejecucion siguiente proceso -->
            <input type="hidden" name="totalhed" value="<?php echo $totalhed;?>">
            <input type="hidden" name="totalhen" value="<?php echo $totalhen;?>">
            <input type="hidden" name="totalrn" value="<?php echo $totalrn;?>">
            <input type="hidden" name="totalrd" value="<?php echo $totalrd;?>"> 
            <input type="hidden" name="totalhedd" value="<?php echo $totalhedd;?>">
            <input type="hidden" name="totalhend" value="<?php echo $totalhend;?>">
            <input type="hidden" name="totalrnd" value="<?php echo $totalrnd;?>">            
            <button type="button" onclick="location.href='consultareg.php'">VOLVER</button>
            <input type="submit" name="Export" value="Exportar">
            <input type="submit" name="Autoriza" value="Autorizar">
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