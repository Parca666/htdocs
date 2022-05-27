<?php
    if($_POST == NULL)
    {
        require_once('./Vistas/login.php');
    }
    else
    {
        require './Modelos/connectaBD.php';
        $con = connectaBD();

        $email = $_POST["Email"];
        $contrasena = $_POST["Contraseña"];
        $contrasenaHash =0;
        require_once './Modelos/login.php';
        $numCorreos = comprobarCorreo($con, $email);

        //Si existe el correo
        if ($numCorreos != null){

            $contrasenaBD = getContraseña($con, $email);
            $hash = $contrasenaBD[0][0];

            //print_r($contrasenaBD);
            print_r( password_verify ($contrasena , $hash));
            $contrasenaHash =  password_verify ($contrasena , $hash);

            print_r($contrasenaHash);
        }

        if($contrasenaHash){

            $idUsuario = getId($con, $email);
            $_SESSION['usuario'] = $idUsuario[0]['idUsuario'];
            header('Refresh: 1; URL=index.php?dest=MJuego');
        }
        else
        {
            $_SESSION['errMsg'] = "El correo o contraseña no son válidos";
            require_once 'Vistas/login.php';
        }



    }