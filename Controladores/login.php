<?php
    if($_POST == NULL)
    {
        require_once('./Vistas/login.php');
    }
    else
    {
        require './Modelos/connectaBD.php';
        $con = connectaBD();

        $correo = $_POST["Correo"];
        $contrasena = $_POST["Contraseña"];
        $contrasenaHash =0;
        require_once './Modelos/login.php';
        $numCorreos = comprobarCorreo($con, $correo);
        //Si existe el correo
        if ($numCorreos != null){
            $contrasenaBD = getContraseña($con, $correo);
            $hash = $contrasenaBD[0][0];
            $contrasenaHash =  password_verify ($contrasena , $hash);
        }

        if($contrasenaHash){
            $idUsuario = getId($con, $correo);
            $_SESSION['usuario'] = $idUsuario[0]['idUsuario'];
            $_SESSION['carrito']= null;
            header('Refresh: 1; URL=index.php');
        }
        else
        {
            $_SESSION['errMsg'] = "El correo o contraseña no son válidos";
            require_once 'Vistas/login.php';
        }



    }