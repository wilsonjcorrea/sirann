<div id="Menu">
  <h4>Usuario: <?php 
  include("../includes/conect.php");
  session_start();
  if(!isset($_SESSION['user'])){
    header("location:../index.php");
  }
  else{
  $user=($_SESSION['user']);
  echo ($user);
  }
  $consulta="SELECT *FROM tbladministrador WHERE usuario='$user'";
  $result=mysqli_query($con,$consulta);
  $filas=mysqli_num_rows($result);
  if ($filas>0 or $user == "Admin") {
      $gestor="administrador";
  }
  else {
      $consulta="SELECT * FROM tblsupervisor WHERE usuario='$user'";
      $result=mysqli_query($con,$consulta);
      $filas=mysqli_num_rows($result);
      if ($filas>0) {
        $gestor="supervisor";
      }
      else {
          $consulta="SELECT * FROM tblportero WHERE usuario='$user'";
          $result=mysqli_query($con,$consulta);
          $filas=mysqli_num_rows($result);
          if ($filas>0) {
            $gestor="portero";
          }
      }
  }
  ?></h4>
  <?php switch($gestor) {
        case "administrador":?>
          <nav id="menu">
            <h3>
              <ul>
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a class='dropdown-arrow'>Configuracion</a>
                      <ul class='sub-menus'>
                        <li><a href='usuariogestor.php'>Crear Usuarios Gestores</a></li>
                        <li><a href='condiciones.php'>Gestionar Condiciones</a></li>
                        <li><a href='turnos.php'>Gestionar Turnos</a></li>
                        <li><a href='cargos.php'>Crear Cargos</a></li>
                        <li><a href='festivos.php'>Festivos/ Feriados</a></li>
                      </ul>
                    </li>
                    <li><a class='dropdown-arrow'>Usuarios</a>
                      <ul class='sub-menus'>
                        <li><a href='crearusuario.php'>Crear</a></li>
                        <li><a href='modifusuario.php'>Modificar</a></li>
                        <li><a href='asignarturno.php'>Asignar Turnos</a></li>
                      </ul>
                    </li>
                    <li><a class='dropdown-arrow'>Consultas</a>
                      <ul class='sub-menus'>
                        <li><a href='consultareg.php'>Consultas y Autorizacion</a></li>
                      </ul>
                    </li>
                    <li><a class='dropdown-arrow'>Informes</a>
                      <ul class='sub-menus'>
                        <li><a href='informe.php'>Reporte de Novedades</a></li>
                      </ul>
                    </li>
                    <li><a class='dropdown-arrow'>Registro</a>
                      <ul class='sub-menus'>
                        <li><a href='registro.php'>Ingreso/Salida</a></li>
                      </ul>
                    </li>
                    <li><a class='dropdown-arrow'>Bitacora</a>
                      <ul class='sub-menus'>
                        <li><a href='enconstruccion.php'>Novedades Dia</a></li>
                      </ul>
                    </li>
                    <li><a href="../includes/logout.php">Salir</a></li>
              </ul>
            </h3>
          </nav>
      </div>
    <?php
    break;
    case "supervisor":
    ?>
      <nav id="menu">
              <h3>
                <ul>
                      <li><a href="inicio.php">Inicio</a></li>
                      <li><a class='dropdown-arrow'>Configuracion</a>
                        <ul class='sub-menus'>
                          <li><a>Crear Usuarios Gestores</a></li>
                          <li><a>Gestionar Condiciones</a></li>
                          <li><a>Gestionar Turnos</a></li>
                          <li><a>Crear Cargos</a></li>
                        </ul>
                      </li>
                      <li><a class='dropdown-arrow'>Usuarios</a>
                        <ul class='sub-menus'>
                          <li><a>Crear</a></li>
                          <li><a>Modificar</a></li>
                          <li><a href='asignarturno.php'>Asignar Turnos</a></li>
                        </ul>
                      </li>
                      <li><a class='dropdown-arrow'>Consultas</a>
                        <ul class='sub-menus'>
                          <li><a href='consultareg.php'>Consultas y Autorizacion</a></li>
                        </ul>
                      </li>
                      <li><a class='dropdown-arrow'>Informes</a>
                        <ul class='sub-menus'>
                          <li><a href='enconstruccion.php'>Reporte de Novedades</a></li>
                        </ul>
                      </li>
                      <li><a class='dropdown-arrow'>Registro</a>
                        <ul class='sub-menus'>
                          <li><a>Ingreso/Salida</a></li>
                        </ul>
                      </li>
                      <li><a class='dropdown-arrow'>Bitacora</a>
                        <ul class='sub-menus'>
                          <li><a href='enconstruccion.php'>Novedades Dia</a></li>
                        </ul>
                      </li>
                      <li><a href="../includes/logout.php">Salir</a></li>
                </ul>
              </h3>
            </nav>
        </div>
      <?php
      break;
      case "portero":
      ?>   
        <nav id="menu">
          <h3>
            <ul>
                  <li><a href="inicio.php">Inicio</a></li>
                  <li><a class='dropdown-arrow'>Configuracion</a>
                    <ul class='sub-menus'>
                      <li><a>Crear Usuarios Gestores</a></li>
                      <li><a>Gestionar Condiciones</a></li>
                      <li><a>Gestionar Turnos</a></li>
                      <li><a>Crear Cargos</a></li>
                    </ul>
                  </li>
                  <li><a class='dropdown-arrow'>Usuarios</a>
                    <ul class='sub-menus'>
                      <li><a>Crear</a></li>
                      <li><a>Modificar</a></li>
                      <li><a>Asignar Turnos</a></li>
                    </ul>
                  </li>
                  <li><a class='dropdown-arrow'>Consultas</a>
                    <ul class='sub-menus'>
                      <li><a href='enconstruccion.php'>Consultas y Autorizacion</a></li>
                    </ul>
                  </li>
                  <li><a class='dropdown-arrow'>Informes</a>
                    <ul class='sub-menus'>
                      <li><a href='enconstruccion.php'>Reporte de Novedades</a></li>
                    </ul>
                  </li>
                  <li><a class='dropdown-arrow'>Regisro</a>
                    <ul class='sub-menus'>
                      <li><a href='registro.php'>Ingreso/Salida</a></li>
                    </ul>
                  </li>
                  <li><a class='dropdown-arrow'>Bitacora</a>
                    <ul class='sub-menus'>
                      <li><a href='enconstruccion.php'>Novedades Dia</a></li>
                    </ul>
                  </li>
                  <li><a href="../includes/logout.php">Salir</a></li>
              </ul>
          </h3>
        </nav>
    </div>
  <?php
  }
  ?>