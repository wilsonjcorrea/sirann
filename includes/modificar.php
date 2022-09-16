<?php
//coneccion base de datos
include("conect.php");
//selctor de pagina para caso
$page=($_POST["pagina"]);
switch($page) {
    
    //caso1 Asignar Turno
    case "asignarturno1.php":
    $fp=fopen("../vistas/asignarturno1.php","r");
    while (!feof($fp)) {
        $buffer=fgets($fp,4096);
        }
    //Variables
    $id=$_POST["id"];//viene de la pagina anterior
    $idT=$_POST["id_Turno"];
    //Ciclo for  con arreglo 
    for ($j=0 ;$j < sizeof($id); ++$j){
    $actualizar = "UPDATE tblinfo SET id_Turno='$idT[$j]' WHERE id='$id[$j]'";//comando para actualizar base de datos 
    $resultado=mysqli_query($con,$actualizar);//actualizacion a base de datos
    }
    //resultado
    if ($resultado){
        echo"<script>alert('se actualizaron los datos correctamente');
        window.location='../vistas/asignarturno.php';</script>";
    }
    else {echo"<script>alert('No se actualizaron los datos, Intente de nuevo');
        windows.history.go(-1);</script>";
    }
    mysqli_close($con);
    fclose($fp);
    break;

    //caso2 Modificar Usuario
    case "modifusuario1.php":
        $fp=fopen("../vistas/modifusuario1.php","r");
        while (!feof($fp)) {
            $buffer=fgets($fp,4096);
            }
        //Variables
        $id=$_POST["id"];//viene de la pagina anterior
        $doc=$_POST["DOC"];
        $nombre=$_POST["Nombre"];
        $apellido=$_POST["Apellido"];
        $fingreso=$_POST["F_Ingreso"];
        $fretiro=$_POST["F_Retiro"];
        $activo=$_POST["Activo"];
        $idcargo=$_POST["id_Cargo"];
        $idcondic=$_POST["id_Condic"];
        $idsuper=$_POST["id_Super"];
        $idadmin=$_POST["id_Admin"];
        //Ciclo for  con arreglo 
        for ($j=0 ;$j < sizeof($id); ++$j){
        $actualizar = "UPDATE tblinfo SET DOC='$doc[$j]',Nombre='$nombre[$j]',Apellido='$apellido[$j]',
        F_Ingreso='$fingreso[$j]',F_Retiro='$fretiro[$j]',Activo='$activo[$j]',id_Cargo='$idcargo[$j]',
        id_Condic='$idcondic[$j]',id_Super='$idsuper[$j]',id_Admin='$idadmin[$j]' WHERE id='$id[$j]'";//comando para actualizar base de datos 
        $resultado=mysqli_query($con,$actualizar);//actualizacion a base de datos
        }
        //resultado
        if ($resultado){
            echo"<script>alert('se actualizaron los datos correctamente');
            window.location='../vistas/modifusuario.php';</script>";
        }
        else {echo"<script>alert('No se actualizaron los datos, Intente de nuevo');
            windows.history.go(-1);</script>";
        }
        mysqli_close($con);
        fclose($fp);
        break;
    }