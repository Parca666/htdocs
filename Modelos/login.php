<?php

    function comprobarCorreo($con, $correo)
    {
        $sql = 'SELECT COUNT(*) as nUsuarios FROM `Usuario` WHERE correo = "'.$correo.'" GROUP BY nombre';
        $consulta = $con->prepare($sql);
        $consulta->execute();

        return( $consulta->fetchAll());
    }

    function getContraseña($con, $correo)
    {
        $sql = 'SELECT `contraseña` FROM `Usuario` WHERE `correo` = "'.$correo.'" ';
        $consulta = $con->prepare($sql);
        $consulta->execute();
        return($consulta->fetchAll());
    }

    function getId($con, $correo)
    {
        $sql = 'SELECT `idUsuario` FROM `Usuario` WHERE `correo` = "'.$correo.'" ';
        $consulta = $con->prepare($sql);
        $consulta->execute();
        return($consulta->fetchAll());
    }
