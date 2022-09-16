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
    <?php 
        $doc= $_POST['DOC'];
        $nombre=$_POST['Nombre'];
        $apellido=$_POST['Apellido'];
    ?>
    <section id="Principal">
          <h2><b>MODIFICAR USUARIOS</b></h2>
            <h1>Modifique los campos que requiera cambiar, de los usuarios listados segun los filtros suministrados. </h1>
            <div class="formpage">
            <form action="../includes/modificar.php" method="POST">
            <input type="hidden" name="pagina" value="modifusuario1.php">
            <table border="1" bgcolor="white" width="95%">
                  <tr>
                    <th width="3%">Doc Identidad</th>
                    <th width="10%">Nombre</th>
                    <th width="10%">Apellido</th>
                    <th width="10%">F.Ingreso</th>
                    <th width="10%">F.Retiro</th>
                    <th width="5%">Activo</th>
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
                    <td><input type="number" zize="5" value="<?php echo $fila->DOC;?>" name="DOC[]"></td>
                    <?php $array_nombre= array('Nombre');?>
                    <td><input type="text" value="<?php echo $fila->Nombre;?>" name="Nombre[]"></td>
                    <?php $array_apellido= array('Apellido');?>
                    <td><input type="text" value="<?php echo $fila->Apellido;?>" name="Apellido[]"></td>
                    <?php $array_fingreso= array('F_Ingreso');?>
                    <td><input type="date" value="<?php echo $fila->F_Ingreso;?>" name="F_Ingreso[]"></td>
                    <?php $array_fretiro= array('F_Retiro');?>
                    <td><input type="date" value="<?php echo $fila->F_Retiro;?>" name="F_Retiro[]"></td>
                    <td>
                    <?php 
                        $activo= $fila->id;
                        $resultado1= mysqli_query($con,"SELECT Activo FROM tblinfo where id='$activo';");
                        while ($fila1 = $resultado1->fetch_assoc()):
                        $status=$fila1['Activo'];      
                        echo $fila1['Activo'];
                        endwhile;?>
                      <?php $array_status= array('Activo');?>
                      <select name="Activo[]">
                      <?php echo "<option value=$status>Seleccione</option>"?>
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
                        <?php echo "<option value=$cargo>Seleccione</option>"?>
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
                        <?php echo "<option value=$condic>Seleccione</option>"?>
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
                        <?php echo "<option value=$idsuper>Seleccione</option>"?>
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
                        $resultado1= mysqli_query($con,"SELECT usuario FROM tbladministrador where Id='$idadmin';");
                        while ($fila1 = $resultado1->fetch_assoc()):      
                        echo $fila1['usuario'];
                        endwhile;?>
                        <?php $array_idadmin= array('id_Admin');?>
                        <select name="id_Admin[]">
                        <?php echo "<option value=$idadmin>Seleccione</option>"?>
                        <?php
                        $resultado2 = mysqli_query($con,"SELECT * FROM tbladministrador");
                        while ($fila2 = $resultado2->fetch_assoc()):
                        $id1 = $fila2['Id'];
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
            <button type="button" onclick="location.href='modifusuario.php'">VOLVER</button>
            </form>
          </div>
    </section>
    <!--Pie de pagina General-->
    <?php if($filas<9){
      include ('piepagina.php');
      }
      else{
      mysqli_close($con);
      }
    ?>
</body> 
</html>