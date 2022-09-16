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
    <section id="Principal">
          <h2><b>FESTIVOS O FERIADOS</b></h2>
          <h3>Introduzca las fechas festivas o dias feriados de su pais,<br>
           se sugiere no tener en cuenta las fechas que coiniden con domingos.</h3>
            <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
            <img src="../images/construction_tool2.png" id="imagenderecha">
            <div class="centrarformulario">
            <form action= "../includes/ingresar.php" method="post" class="blanco">
            <input type="hidden" name="pagina" value="festivos.php">
            F_Festivo:<input type="date" name="F_festivo" value=date_add placeholder="aaaa/mm/dd"><br>
            <input type="submit" name="enviar" value="INGRESAR">
            <input type="reset" value="LIMPIAR">
            </form>
            </div> 
            <img src="../images/calendario2.png" id="imagencentrobajo">
     </section>
    <!--Pie de pagina General-->
    <?php include ('piepagina.php');?>
</body> 
</html>


