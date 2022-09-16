<?php
$fp=fopen("pruebas.php","r");
while (!feof($fp)) {
    $buffer=fgets($fp,4096);
}
$con=mysqli_connect('localhost','root','','bd_sirann') or die 
('Error en la conexion con el servidor');
$usuario=$_POST['id_doc'];
$consulta="SELECT * FROM tblinfo WHERE DOC='$usuario'";
$resultado=mysqli_query($con,$consulta);
while ($fila = $resultado->fetch_assoc()):
   echo $fila['id_Turno'];
endwhile;  

/*$filas=mysqli_num_rows($result);

if ($filas>0) {
    $sql="insert into tblregistro (id_doc,FechaHora,Novedad,id_portero,id_turno)
        values('".$_POST["id_doc"]."','".$_POST["FechaHora"]."','".$_POST["Novedad"]."',
        '".$_POST["id_portero"]."','".$_POST["id_turno"]."')";
        $resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');
    header ("location:pruebas.php");
}
else {
    echo "Nombre usuario o clave incorrecto";
    ?>
    <html><head>
    <meta http-equiv="refresh" content="2;pruebas.html">
    </head></html>
    <?php
}
            
mysqli_free_result($result);
mysqli_close($con);*/
?>