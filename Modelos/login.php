<?php

    function comprobarCorreo($con, $email)
    {
        $sql = 'SELECT COUNT(*) as nUsuarios FROM `usuario` WHERE email = "'.$email.'" GROUP BY nick';
        $consulta = $con->prepare($sql);
        $consulta->execute();

        return( $consulta->fetchAll());
    }

    function getContraseña($con, $email)
    {
        $sql = 'SELECT `contrasena` FROM `usuario` WHERE `email` = "'.$email.'" ';
        $consulta = $con->prepare($sql);
        $consulta->execute();
        return($consulta->fetchAll());
    }

    function getid($con, $email)
    {
        $sql = 'SELECT `idUsuario` FROM `usuario` WHERE `email` = "'.$email.'" ';
        $consulta = $con->prepare($sql);
        $consulta->execute();
        return($consulta->fetchAll());
    }
