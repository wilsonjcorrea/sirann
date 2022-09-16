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
    <?php include ('../vistas/encabezado.php');?>
    <!--Menu General-->
    <?php include ('../vistas/menu.php');?>
    <!--Contenido especifico-->
    <section id="Principal">
          <h2><b>RESGISTRO INGRESOS Y SALIDAS</b></h2>
            <h1>Pase el codigo de su carnet bajo el lector de codigos de barras</h1>
            <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
            <img src="../images/calendario2.png" id="imagenderecha">
            <div class="centrarformulario">                  
          <form action= "../includes/ingresar.php" method="post" class="blanco">
          <input type="hidden" name="usuario" value="<?php echo($user);?>"><br>
          <input type="hidden" name="pagina" value="registro.php"><br>
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
          </div>
    </section>           
    <!--Pie de pagina General-->
    <?php include ('../vistas/piepagina.php');?>
</body> 
</html>