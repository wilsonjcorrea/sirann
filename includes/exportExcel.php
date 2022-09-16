<?php
include("conect.php");
 $doc= $_POST['DOC'];
 $fini=$_POST['FIni'];
 $ffin=$_POST['FFin'];
 $totalhed=$_POST['totalhed'];
 $totalhen=$_POST['totalhen'];
 $totalrn=$_POST['totalrn'];
 $totalrd=$_POST['totalrd'];
 $totalhedd=$_POST['totalhedd'];
 $totalhend=$_POST['totalhend'];
 $totalrnd=$_POST['totalrnd'];
 $Ffin=date("Y-m-d H:m:s",strtotime($ffin."+ 1 days"));
 $sql1 = "SELECT * FROM tblregistro 
 WHERE id_doc='$doc' AND FechaHora between '$fini' AND '$Ffin' AND Novedad ='In'";
 $sql2 = "SELECT * FROM tblregistro 
 WHERE id_doc='$doc' AND FechaHora between '$fini' AND '$Ffin' AND Novedad ='Out'";
 $result1 = mysqli_query($con,$sql1);
 $result2 = mysqli_query($con,$sql2);
 $page=($_POST["pagina"]);

 if(isset($_POST["Export"])){

header("Content-Type: application/xls");	
header("Content-Disposition: attachment; filename= $page" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

$output="";
    $output .="
        <table>
            <thead>
                <tr>
                    <th>Doc Identidad</th>
                    <th>Fecha</th>
                    <th>Dia</th>
                    <th>Entra</th>
                    <th>Sale</th>
                    <th>Horas</th>
                    <th>HED</th>
                    <th>HEN</th>
                    <th>RN</th>
                    <th>RD</th>
                    <th>HEDD</th>
                    <th>HEND</th>
                    <th>RDD</th>
                    <th>RND</th>
                    <th>Observacion</th>
                </tr>
            </thead>
        <table>
    ";
    while($fila = mysqli_fetch_object($result1) and $fila2 = mysqli_fetch_object($result2)){
    
        $output .= include('imp_calculohoras.php'); 
    }
    $output .= "
        </table>
    ";
    echo $output;
}
if(isset($_POST["Autoriza"])){

    include('../vistas/consultareg2.php');
    
}

?>