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
    <section id="Principal">
          <h2><b>CONSULTA REGISTROS</b></h2>
            <h1>Sellecccione el usaurio a modificar, por alguna de las claves</h1>
            <img src="../images/NEUROFICICON4.png" id="imagenizquierda">
            <div class="centrarformulario">
          <form action= "consultareg1.php" method="post" class="blanco">  
                  <table border="1" bgcolor="white" width="100%">
                  <tr>
                    <th width="10%">Doc Identidad</th>  
                    <th width="30%">Fecha Inicial</th>
                    <th width="30%">Fecha Final</th>
                  </tr>
                  <?php $array_select=array('mi_select');?>
                  <td>
                    <select name="DOC">
                    <option value="mi_select[]">Seleccione</option>
                    <?php
                     $result = mysqli_query($con,"SELECT * FROM tblinfo");
                    while ($fila = $result->fetch_assoc()):
                    $doc = $fila['DOC'];
                    echo "<option value=$doc>$doc</option>";
                    endwhile;
                    ?>
                    </select>
                  </td>
                    </td>
                    <td>
                    <input type="date" name="FIni" value="1901/01/01" placeholder="aaaa/mm/dd">
                    </td>
                    <td>
                    <input type="date" name="FFin" value="1901/01/01" placeholder="aaaa/mm/dd">
                  </td>
                  </tr>
            </table>
            <input type="submit" name="id" value="SELECCIONAR">
            <input type="reset" value="LIMPIAR">
            </form>
            </div>
        </section>
    <!--Pie de pagina General-->
    <?php include ('piepagina.php');?>
</body> 
</html>