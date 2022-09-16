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
        $id= $_POST['mi_select'];
    ?>
    <!--Encabezado General-->
    <?php include ('encabezado.php');?>
    <!--Menu General-->
    <?php include ('menu.php');?>
    <!--Contenido especifico-->
    <section id="Principal">
          <h2><b>ASIGNAR TURNOS</b></h2>
            <img src="../images/chicajoven2.png" id="imagenizquierda">
            <img src="../images/videollamada2.png" id="imagenderecha">
            <h1>Asignar masivamente turnos</h1>
            <div class="centrarformulario">
            <form action="../includes/modificar.php" method="POST">
            <input type="hidden" name="pagina" value="asignarturno1.php">
            <table border="1" bgcolor="white" width="100%">
                  <tr>
                    <th width="30%">Nombre</th>
                    <th width="30%">Apellido</th>
                    <th width="10%">T Ant</th>
                    <th width="30%">T Nuevo</th>
                  </tr>
                  <?php 
                  $sql = "select * from tblinfo where id_Super='$id'";
                  $result = mysqli_query($con,$sql);
                  $filas=mysqli_num_rows($result);
                  while($fila = mysqli_fetch_object($result)){
                    ?>
                    <tr>
                    <?php $array_id= array('id');?>
                    <input type="hidden" value="<?php echo $fila->id;?>" name="id[]">
                    <td><?php echo $fila->Nombre;?></td>
                    <td><?php echo $fila->Apellido;?></td>
                    <?php $tant= $fila->id_Turno;?>
                    <td><?php 
                      $resultado2= mysqli_query($con,"SELECT * FROM tblturno where id='$tant'");
                      while ($fila1 = $resultado2->fetch_assoc()):
                      $hini = $fila1['H_Inicio'];
                      $hfin = $fila1['H_Fin'];
                      echo $hini."-".$hfin;
                      endwhile;
                      ?>
                    </td>
                    <td>
                      <?php $array_idt= array('id_Turno');?>
                      <select name="id_Turno[]">
                      <?php echo "<option value=$tant>Seleccione</option>"?>
                      <?php
                      $resultado1 = mysqli_query($con,"SELECT * FROM tblturno");
                      while ($fila = $resultado1->fetch_assoc()):
                      $id1 = $fila['id'];
                      $hini = $fila['H_Inicio'];
                      $hfin = $fila['H_Fin'];
                      echo "<option value=$id1>$hini - $hfin</option>";
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
<?php
if($filas<10){
  include ('piepagina.php');
}
else{
  mysqli_close($con);
}
?>
</body> 
</html>