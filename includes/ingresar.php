<?php
    include("conect.php");
    $page=($_POST["pagina"]);
    switch($page) {
        case "crearusuario.php":
            $fp=fopen("../vistas/crearusuario.php","r");
            while (!feof($fp)) {
            $buffer=fgets($fp,4096);
            }
            $sql="insert into tblinfo (DOC,Nombre,Apellido,F_Ingreso,F_retiro,Activo,
            id_Cargo,id_turno,id_condic,id_super,id_admin)
            values('".$_POST["DOC"]."','".$_POST["Nombre"]."','".$_POST["Apellido"]."',
            '".$_POST["F_Ingreso"]."','".$_POST["F_Retiro"]."','".$_POST["Activo"]."',
            '".$_POST["id_Cargo"]."','".$_POST["id_Turno"]."','".$_POST["id_Condic"]."',
            '".$_POST["id_Super"]."','".$_POST["id_Admin"]."')";
            $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/crearusuario.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/crearusuario.php">
            </head></html>
            <?php
        break;
        case "cargos.php":
            $fp=fopen("../vistas/cargos.php","r");
            while (!feof($fp)) {
            $buffer=fgets($fp,4096);
            }
            $sql="insert into tblcargo (cargo)
            values('".$_POST["cargo"]."')";
            $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/cargos.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/cargos.php">
            </head></html>
            <?php
        break;
        case "condiciones.php":
            $fp=fopen("../vistas/condiciones.php","r");
            while (!feof($fp)) {
                $buffer=fgets($fp,4096);
                }
            $sql="insert into tblcondiciones (HxS,RecNocIni,RecNocFin)
            values('".$_POST["HxS"]."','".$_POST["RecNocIni"]."','".$_POST["RecNocFin"]."')";
            $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/condiciones.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/condiciones.php">
            </head></html>
            <?php
        break;
        case "turnos.php":
            $fp=fopen("../vistas/turnos.php","r");
            while (!feof($fp)) {
            $buffer=fgets($fp,4096);
            }
            $sql="insert into tblturno (HxT,H_Inicio,H_Fin,DiaSem,T_Almuerzo,T_Break,DiaSemF)
            values('".$_POST["HxT"]."','".$_POST["H_Inicio"]."','".$_POST["H_Fin"]."',
            '".$_POST["DiaSem"]."','".$_POST["T_Almuerzo"]."','".$_POST["T_Break"]."',
            '".$_POST["DiaSemF"]."')";
            $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/turnos.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/turnos.php">
            </head></html>
            <?php
        break;
        case "usuariogestor.php":  
            $fp=fopen("../vistas/usuariogestor.php","r");
            while (!feof($fp)) {
                $buffer=fgets($fp,4096);
            }
            $tipo=($_POST["tipo"]);
                switch($tipo) {
                case "sql":
                    $sql="insert into tbladministrador (usuario,contrasena)
                    values('".$_POST["usuario"]."','".$_POST["contrasena"]."')";
                    $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
                    break;
                case "sql1":
                    $sql1="insert into tblsupervisor (usuario,contrasena)
                    values('".$_POST["usuario"]."','".$_POST["contrasena"]."')";
                    $resultado=mysqli_query($con,$sql1) or die ('Error al actualizar BD');
                    break;
                case "sql2":
                    $sql2="insert into tblportero (usuario,contrasena)
                    values('".$_POST["usuario"]."','".$_POST["contrasena"]."')";
                    $resultado=mysqli_query($con,$sql2) or die ('Error al actualizar BD');
                    break;
                }
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/usuariogestor.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/usuariogestor.php">
            </head></html>
            <?php
        break;
        case "registro.php":  
            $fp=fopen("../vistas/registro.php","r");
            while (!feof($fp)) {
                $buffer=fgets($fp,4096);
            }
            $user=($_POST['usuario']);
            $consulta1="SELECT * FROM tblportero WHERE usuario='$user'";
            $resultado1=mysqli_query($con,$consulta1);
            while ($fila2=$resultado1->fetch_assoc()){
                $idportero=($fila2['id']);
                }
            $usuario=$_POST['id_doc'];
            $consulta="SELECT * FROM tblinfo WHERE DOC='$usuario'";
            $resultado=mysqli_query($con,$consulta);
            while ($fila1 = $resultado->fetch_assoc()){
            $turno= $fila1['id_Turno'];
            }
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Bogota'));
            $DateAndTime = $Object->format("Y-m-d G:i:s");  
            $filas=mysqli_num_rows($resultado);
            
            if ($filas>0) {
                $sql="insert into tblregistro (id_doc,FechaHora,Novedad,id_portero,id_turno)
                    values('".$_POST["id_doc"]."','$DateAndTime','".$_POST["Novedad"]."',
                    '$idportero','$turno')";
                    $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
                echo "Registro grabado corectamente";
                ?>
                <html><head>
                <meta http-equiv="refresh" content="2;../vistas/registro.php">
                </head></html>
                <?php
                //header ("location:../vistas/registro.php");
            }
            else {
                echo "No se reconoce el usuario, favor espere y/o comuniquese con el administrador.";
                ?>
                <html><head>
                <meta http-equiv="refresh" content="2;../vistas/registro.php">
                </head></html>
                <?php
            }
                 
            
            mysqli_close($con);
            
                
        break;

        case "festivos.php":
            $fp=fopen("../vistas/festivos.php","r");
            while (!feof($fp)) {
            $buffer=fgets($fp,4096);
            }
            $sql="insert into tblfestivos (F_festivo)
            values('".$_POST["F_festivo"]."')";
            $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/festivos.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/festivos.php">
            </head></html>
            <?php
        break;
        case "consultareg2.php":
            $fp=fopen("../vistas/consultareg2.php","r");
            while (!feof($fp)) {
            $buffer=fgets($fp,4096);
            }
            $Object = new DateTime();  
            $Object->setTimezone(new DateTimeZone('America/Bogota'));
            $DateAndTime = $Object->format("Y-m-d G:i:s");  
            $sql="insert into tblinforme (id_doc,FechaHora,F_Ini,F_Fin,HED,HEN,RN,RD,HEDD,HEND,RND,
            id_usuario,Observacion)
            values('".$_POST["DOC"]."','$DateAndTime','".$_POST["FIni"]."',
            '".$_POST["FFin"]."','".$_POST["thed"]."','".$_POST["then"]."',
            '".$_POST["trn"]."','".$_POST["trd"]."','".$_POST["thedd"]."',
            '".$_POST["thend"]."','".$_POST["trnd"]."','".$_POST["usuario"]."','".$_POST["Observacion"]."')";
            $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/consultareg2.php">
            </head></html>
            <?php
            mysqli_close($con);
            echo 'Registro grabado correctamente';
            fclose($fp);
            echo $buffer;
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../vistas/consultareg.php">
            </head></html>
            <?php
        break;
      }
?>