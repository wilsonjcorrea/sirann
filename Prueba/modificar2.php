<?php
$fp=fopen("crearusuario.php","r");
while (!feof($fp)) {
$buffer=fgets($fp,4096);
}
$con=mysqli_connect('localhost','root','','bd_sirann') or die 
('Error en la conexion con el servidor');
$id=$_POST["id"];
$idint=(int)$id;
$idT=$_POST["id_Turno"];
$Tint=(int)$idT;

/*for ($i=0 ;$i < sizeof($id); ++$i){
    echo $id;
}*/
//foreach ($idT as $T){
    //foreach ($id as $i){
        for ($j=0 ;$j < sizeof($id); ++$j){
        $actualizar = "UPDATE tblinfo SET id_Turno='$idT[$j]' WHERE id='$id[$j]'";
        $resultado=mysqli_query($con,$actualizar);
    }
    
/*
foreach ($idT as $T){
    echo "<br>".$T;
}
$actualizar = "UPDATE tblinfo SET id_Turno='$idT' WHERE id='$id'";
$resultado=mysqli_query($con,$actualizar);
/*echo sizeof($id);
    //$idT=$_POST["id_Turno"];
    //$Tint=(int)$idT;
    //$actualizar = "UPDATE tblinfo SET id_Turno='$Tint' WHERE id='$i'";
    //$resultado=mysqli_query($con,$actualizar);*/

if ($resultado){
    echo"<script>alert('se actualizaron los datos correctamente');
    window.location='pruebas.php';</script>";
}
else {echo"<script>alert('No se actualizaron los datos, Intente de nuevo');
    windows.history.go(-1);</script>";
}
mysqli_close($con);
fclose($fp);

/*<?php
$fp=fopen("crearusuario.php","r");
while (!feof($fp)) {
$buffer=fgets($fp,4096);
}
$con=mysqli_connect('localhost','root','','bd_sirann') or die 
('Error en la conexion con el servidor');
$id=$_POST["id"];
$idT=$_POST["id_Turno"];
$actualizar = "UPDATE tblinfo SET id_Turno='$idT' WHERE id='$id'";
$resultado=mysqli_query($con,$actualizar);
if ($resultado){
    echo"<script>alert('se actualizaron los datos correctamente');
    window.location='pruebas.php';</script>";
}
else {echo"<script>alert('No se actualizaron los datos, Intente de nuevo');
    windows.history.go(-1);</script>";
}
mysqli_close($con);
fclose($fp);

?>*/