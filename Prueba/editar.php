<?php
$con=mysqli_connect('localhost','root','','bd_sirann') or die 
('Error en la conexion con el servidor');

$id = $_POST['id']
$campo = $_POST['Campo']
$tblname= $_POST['Tabla']
$valcampo= $_POST['ValCampo']

$actualizar = "UPDATE".$tblname "SET" .$campo = $valcampo "WHERE" 'id'=$id;

$result=mysqli_query($con,$actualizar)
?>
<html><head>
<meta http-equiv="refresh" content="2;pruebas.php">
</head></html>
<?php
mysqli_close($con);
echo 'Registro grabado correctamente';
fclose($fp);
?>
<html><head>
<meta http-equiv="refresh" content="2;pruebas.php">
</head></html>


<!--$sql="insert into tblinfo (DOC,Nombre,Apellido,F_Ingreso,F_retiro,Activo,
id_Cargo,id_turno,id_condic,id_super,id_admin)
values('".$_POST["DOC"]."','".$_POST["Nombre"]."','".$_POST["Apellido"]."',
'".$_POST["F_Ingreso"]."','".$_POST["F_Retiro"]."','".$_POST["Activo"]."',
'".$_POST["id_Cargo"]."','".$_POST["id_Turno"]."','".$_POST["id_Condic"]."',
'".$_POST["id_Super"]."','".$_POST["id_Admin"]."')";
$resultado=mysqli_query($con,$sql) or die ('Error al actualizar BD');

/*function edit($tblname,$form_data,$field_id,$id){
	$sql5 = "UPDATE ".$tblname." SET ";
	$data = array();

	foreach($form_data as $column=>$value){

		$data[] =$column."="."'".$value."'";

	}
	$sql5 .= implode(',',$data);
	$sql5.=" where ".$field_id." = ".$id."";
	return db_query($sql5); 
}
?>
UPDATE tblinfo SET id_Turno=3 WHERE id = 2;-->
<!--<a href="pruebas1.php?id=<?php echo $fila->id;?>">Seleccionar</a></td>-->