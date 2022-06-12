<?php
    if($_POST == NULL)
    {
        require_once('./Vistas/registro.php');
    }
    else {
        require './Modelos/connectaBD.php';
        $con = connectaBD();

        //print_r($con);

        //Coger variables
        $nick = $_POST["Nick"];
        $email = $_POST["Email"];
        $contrasena = $_POST["Contraseña"];
        $contrasenaHash =  password_hash($contrasena, PASSWORD_DEFAULT);

        $error = 0;

        //Comprobamos correo
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 1;
        }else{
            require_once ('./Modelos/registro.php');
            $comprobar = comprobarCorreo($con,$email);
            if ($comprobar > 0 && $comprobar != NULL) {
                $error = 1;
            }
        }

        //printar resultado final
        if($error == 0){
            require_once ('./Modelos/registro.php');
            insertarUsuario($con,$nick,$contrasenaHash,$email);
            $_SESSION['errMsg'] = "¡Registro completado con éxito!";
            header('Refresh: 2; URL=index.php');
        }else{
            if($error == 1) {
                $_SESSION['errMsg'] = "Lo lamentamos, pero el correo usado no es válido o está ya en uso.";
            }
            if($error == 2) {
                $_SESSION['errMsg'] = "Lo lamentamos, el código postal no es válido.";
            }
            if($error == 3) {
                $_SESSION['errMsg'] = "El correo usado no es válido o está ya en uso. El código postal no es válido.";
            }
            require_once('./Vistas/registro.php');
        }

    }
