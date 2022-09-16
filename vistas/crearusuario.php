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
          <h2><b>CREAR USUARIOS</b></h2>
          <h3>Para crear los nuevos usuarios del sistema, es necesario revisar antes el menu configuracion.</h3>
            <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
            
            
            <div class="centrarformulario">
            <form action= "../includes/ingresar.php" method="post" class="blanco">
            <input type="hidden" name="pagina" value="crearusuario.php">
            DOC:<input type="number" name="DOC" placeholder="CEDULA"><br>
            Nombre:<input type="text" name="Nombre" placeholder="INGRESE_NOMBRES"><br>
            Apellido:<input type="text" name="Apellido" placeholder="INGRESE_APELLIDOS"><br>
            F_Ingreso:<input type="date" name="F_Ingreso" value=date_add placeholder="aaaa/mm/dd"><br>
            F_Retiro:<input type="date" name="F_Retiro" value="1901/01/01" placeholder="aaaa/mm/dd"><br>
            Activo: <input type="radio" name="Activo" value="S" checked>Inactivo:<input type="radio" name="Activo" value="N"><br>
            Cargo:<select name="id_Cargo">
                <option value="1">Seleccione</option>
                <?php
                $resultado1 = mysqli_query($con,"SELECT * FROM bd_sirann.tblcargo");
                while ($fila = $resultado1->fetch_assoc()):
                    $id = $fila['id'];
                    $intid=(int)$id;
                    $cargo = $fila['cargo'];
                    echo "<option value=$intid>$cargo</option>";
                endwhile;
                ?>
            </select><br>
            Turno:<select name="id_Turno">
                <option value="1">Seleccione</option>
                <?php
                $resultado1 = mysqli_query($con,"SELECT * FROM bd_sirann.tblturno");
                while ($fila = $resultado1->fetch_assoc()):
                    $id = $fila['id'];
                    $intid=(int)$id;
                    $hini = $fila['H_Inicio'];
                    $hfin = $fila['H_Fin'];
                    echo "<option value=$intid>$hini a $hfin</option>";
                endwhile;
                ?>
            </select><br>
            Condiciones:<select name="id_Condic">
                <option value="1">Seleccione</option>
                <?php
                $resultado1 = mysqli_query($con,"SELECT * FROM bd_sirann.tblcondiciones");
                while ($fila = $resultado1->fetch_assoc()):
                    $id = $fila['id'];
                    $intid=(int)$id;
                    $hxs= $fila['HxS'];
                    echo "<option value=$intid>$hxs</option>";
                endwhile;
                ?>
            </select><br>
            Supervisor:<select name="id_Super">
                <option value="1">Seleccione</option>
                <?php
                $resultado1 = mysqli_query($con,"SELECT * FROM bd_sirann.tblsupervisor");
                while ($fila = $resultado1->fetch_assoc()):
                    $id = $fila['id'];
                    $intid=(int)$id;
                    $super = $fila['usuario'];
                    echo "<option value=$intid>$super</option>";
                endwhile;
                ?>
            </select><br>
            Administrador:<select name="id_Admin">
                <option value="1">Seleccione</option>
                <?php
                $resultado1 = mysqli_query($con,"SELECT * FROM bd_sirann.tbladministrador");
                while ($fila = $resultado1->fetch_assoc()):
                    $id = $fila['Id'];
                    $intid=(int)$id;
                    $admin = $fila['usuario'];
                    echo "<option value=$intid>$admin</option>";
                endwhile;
                ?>
            </select><br>
            <input type="submit" name="enviar" value="CREAR">
            <input type="reset" value="LIMPIAR">
        </form>
    </div>
    </section>
    <!--Pie de pagina General-->
    <?php include ('piepagina.php');?>
</body> 
</html>


