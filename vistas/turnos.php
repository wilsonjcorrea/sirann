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
          <h2><b>TURNOS</b></h2>
          <h3>Cree los diferentes turnos que requiere su operacioni.</h3>
            <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
            <img src="../images/construction_tool2.png" id="imagenderecha">
            <div class="centrarformulario">
            <form action= "../includes/ingresar.php" method="post" class="blanco">
            <input type="hidden" name="pagina" value="turnos.php">
            Horas Por Turno:<input type="number" name="HxT" placeholder="cantidad Horas"><br>
            Hora Ingreso:<input type="time" name="H_Inicio" placeholder="00:00 a.m."><br>
            Hora Salida:<input type="time" name="H_Fin" placeholder="00:00 p.m."><br>
            Dia Inicio Turno:<select name="DiaSem">
                <option value="0">Seleccione</option>
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miercoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sabado</option>
                <option value="7">Domingo</option>
            </select><br>
            Dia Fin Turno:<select name="DiaSemF">
                <option value="0">Seleccione</option>
                <option value="1">Lunes</option>
                <option value="2">Martes</option>
                <option value="3">Miercoles</option>
                <option value="4">Jueves</option>
                <option value="5">Viernes</option>
                <option value="6">Sabado</option>
                <option value="7">Domingo</option>
            </select><br>
            Tiempo Almuerzo:<input type="time" name="T_Almuerzo" placeholder="00:00"><br>
            Tiempo Break:<input type="time" name="T_Break" placeholder="00:00"><br>
            <input type="submit" name="enviar" value="CREAR">
            <input type="reset" value="LIMPIAR">
            </form>
            </div> 
            <img src="../images/calendario2.png" id="imagencentrobajo">
     </section>
    <!--Pie de pagina General-->
    <?php include ('piepagina.php');?>
</body> 
</html>


