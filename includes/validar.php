<?php
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$con = mysqli_connect('localhost','root','','bd_sirann');
$consulta="SELECT *FROM tbladministrador WHERE usuario='$usuario' and contrasena='$contrasena'";
$result=mysqli_query($con,$consulta);
$filas=mysqli_num_rows($result);

if ($filas>0) {
    header ("location:../vistas/inicio.php");
}
else {
    $consulta="SELECT * FROM tblsupervisor WHERE usuario='$usuario' and contrasena='$contrasena'";
    $result=mysqli_query($con,$consulta);
    $filas=mysqli_num_rows($result);
    if ($filas>0) {
        header ("location:../vistas/inicio.php");
    }
    else {
        $consulta="SELECT * FROM tblportero WHERE usuario='$usuario' and contrasena='$contrasena'";
        $result=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($result);
        if ($filas>0) {
            header ("location:../vistas/inicio.php");
        }
        else {
            echo "Nombre usuario o clave incorrecto";
            ?>
            <html><head>
            <meta http-equiv="refresh" content="2;../index.html">
            </head></html>
            <?php
        }
    }
}
mysqli_free_result($result);
mysqli_close($con);