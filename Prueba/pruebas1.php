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
        $doc= $_POST['DOC'];
        $nombre=$_POST['Nombre'];
        $apellido=$_POST['Apellido'];
    ?>
    <!--Encabezado General-->
    <link rel="stylesheet" href="plantilla1.css">
    <div id="Encabezado">
        <header id="enacabezado">
        <img id="logo-FuSoft"src="images/FuSoft2.png">
        <img id="logo-Neuro"src="images/NEUROFICICON3.png">
        <h1><b>S I R A N N</b></h1>
        <h2>Sistema Integrado de Registro, Accesos, Novedades y Nomina, by FuSoft®</h2>
        </header>
    </div>
    <!--Menu General-->
    <?php include ('menu.php');?>
    <!--Contenido especifico-->
    <section id="Principal">
          <h2><b>MODIFICAR USUARIOS</b></h2>
            <img src="images/chicajoven2.png" id="imagenizquierda">
            <img src="images/videollamada2.png" id="imagenderecha">
            <h1>Modifique los campos que requiera cambiar, de los usuarios listados segun los filtros suministrados. </h1>
            <div class="formpage">
            <form action="modificar2.php" method="POST">
            <table border="1" bgcolor="white" width="100%">
                  <tr>
                    <th width="10%">Doc Identidad</th>
                    <th width="10%">Nombre</th>
                    <th width="10%">Apellido</th>
                    <th width="10%">F.Ingreso</th>
                    <th width="10%">F.Retiro</th>
                    <th width="10%">Activo</th>
                    <th width="10%">Cargo</th>
                    <th width="10%">Condic</th>
                    <th width="10%">Superv</th>
                    <th width="10%">Admin</th>
                  </tr>
                  <?php 
                  $sql = "select * from tblinfo where DOC='$doc'or Nombre='$nombre'or Apellido='$apellido'";
                  $result = mysqli_query($con,$sql);
                  while($fila = mysqli_fetch_object($result)){
                    ?>
                    <tr>
                    <?php $array_id= array('id');?>
                    <input type="hidden" value="<?php echo $fila->id;?>" name="id[]">
                    <?php $array_doc= array('DOC');?>
                    <td><input type="number" value="<?php echo $fila->DOC;?>" name="DOC[]"></td>
                    <?php $array_nombre= array('Nombre');?>
                    <td><input type="text" value="<?php echo $fila->Nombre;?>" name="Nombre[]"></td>
                    <?php $array_apellido= array('Apellido');?>
                    <td><input type="text" value="<?php echo $fila->Apellido;?>" name="Apellido[]"></td>
                    <?php $array_fingreso= array('F_Ingreso');?>
                    <td><input type="date" value="<?php echo $fila->F_Ingreso;?>" name="F_Ingreso[]"></td>
                    <?php $array_fretiro= array('F_Retiro');?>
                    <td><input type="date" value="<?php echo $fila->F_Retiro;?>" name="F_Retiro[]"></td>
                    <td>
                      <?php $array_status= array('Activo');?>
                      <select name="Activo[]">
                      <option value="0"><?php echo $fila->Activo;?></option>
                      <option value="S">SI</option>
                      <option value="N">NO</option>
                      </select>
                      </td>
                      <td>
                        <?php 
                        $cargo= $fila->id_Cargo;
                        $resultado1= mysqli_query($con,"SELECT cargo FROM tblcargo where id='$cargo';");
                        while ($fila1 = $resultado1->fetch_assoc()):      
                        echo $fila1['cargo'];
                        endwhile;?>
                        <?php $array_idcargo= array('id_Cargo');?>
                        <select name="id_Cargo[]">
                        <?php
                        $resultado2 = mysqli_query($con,"SELECT * FROM tblcargo");
                        while ($fila2 = $resultado2->fetch_assoc()):
                        $id1 = $fila2['id'];
                        $cargo1 = $fila2['cargo'];
                        echo "<option value=$id1>$cargo1</option>";
                        endwhile;
                        ?>
                        </select>
                      </td>
                      <td>
                        <?php 
                        $condic= $fila->id_Condic;
                        $resultado1= mysqli_query($con,"SELECT HxS FROM tblcondiciones where id='$condic';");
                        while ($fila1 = $resultado1->fetch_assoc()):      
                        echo $fila1['HxS'];
                        endwhile;?>
                        <?php $array_idcondic= array('id_Condic');?>
                        <select name="id_Condic[]">
                        <?php
                        $resultado2 = mysqli_query($con,"SELECT * FROM tblcondiciones");
                        while ($fila2 = $resultado2->fetch_assoc()):
                        $id1 = $fila2['id'];
                        $condic1 = $fila2['HxS'];
                        echo "<option value=$id1>$condic1</option>";
                        endwhile;
                        ?>
                        </select>
                      </td>
                      <td>
                        <?php 
                        $idsuper= $fila->id_Super;
                        $resultado1= mysqli_query($con,"SELECT usuario FROM tblsupervisor where id='$idsuper';");
                        while ($fila1 = $resultado1->fetch_assoc()):      
                        echo $fila1['usuario'];
                        endwhile;?>
                        <?php $array_idsuper= array('id_Super');?>
                        <select name="id_Super[]">
                        <?php
                        $resultado2 = mysqli_query($con,"SELECT * FROM tblsupervisor");
                        while ($fila2 = $resultado2->fetch_assoc()):
                        $id1 = $fila2['id'];
                        $idsuper1 = $fila2['usuario'];
                        echo "<option value=$id1>$idsuper1</option>";
                        endwhile;
                        ?>
                        </select>
                      </td>
                      <td>
                        <?php 
                        $idadmin= $fila->id_Admin;
                        $resultado1= mysqli_query($con,"SELECT usuario FROM tbladministrador where id='$idadmin';");
                        while ($fila1 = $resultado1->fetch_assoc()):      
                        echo $fila1['usuario'];
                        endwhile;?>
                        <?php $array_idadmin= array('id_Admin');?>
                        <select name="id_Admin[]">
                        <?php
                        $resultado2 = mysqli_query($con,"SELECT * FROM tbladministrador");
                        while ($fila2 = $resultado2->fetch_assoc()):
                        $id1 = $fila2['id'];
                        $idadmin1 = $fila2['usuario'];
                        echo "<option value=$id1>$idadmin1</option>";
                        endwhile;
                        ?>
                        </select>
                      </td>
                      </tr>
                  <?php } ?>
            </table>
            <input type="submit" name="enviar" value="ACTUALIZAR">
            <input type="reset" value="LIMPIAR">
            </form>
          </div>
    </section>
    <!--Pie de pagina General-->
    <footer id="main-footer">
        <p>  FuSoft® Colombia S.A.S, El futuro del software, ahora. <br> fusoftcolombia@gmail.com, Cel.3007799398/3168480497</p>
    </footer>
</body> 
</html>