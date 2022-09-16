    <?php
    include_once "includes/user.php";
    include_once "includes/sesiones.php";
    
    $userSession = new UserSession();
    $user = new User();

    if(isset($_SESSION['user'])){
        //echo "sesion establecida";
        $user->setUser($userSession->getCurrentUser());
        //include_once "vistas/inicio.php";
        header ("location:vistas/inicio.php");
    }
    else{
        if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
            //echo "Validacion Login";
            $userForm = $_POST['usuario'];
            $passForm = $_POST['contrasena'];
            if($user->userExists($userForm, $passForm)){
                //echo "Usuario Validado";
                $userSession->setCurrentUser($userForm);
                $user->setUser($userForm);
                //include_once "vistas/inicio.php";
                header ("location:vistas/inicio.php");
            }
            else{
                //echo"Nombre usuario o contraseña incorrecto";
                $errorLogin = "Nombre usuario o contraseña incorrecto";
                include_once "vistas/login.php";
                //header ("location:vistas/login.php");
            }
        }
        else{
            include_once "vistas/login.php";
            //header ("location:vistas/login.php");
        }
    }
    ?>
    