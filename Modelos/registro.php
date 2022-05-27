<?php
function insertarUsuario($con,$nick,$contrasenaHash,$email)
{
    $sql = "INSERT INTO `usuario` (`idUsuario`,`idPartidaGuardada1`, `idPartidaGuardada2`, `idPartidaGuardada3`, `idPartidaGuardada4`, `idPartidaGuardada5`,  `email`, `nick`, `contrasena`)
            VALUES (NULL,NULL,NULL,NULL,NULL,NULL, :Email,:Nick,  :Contrasena) ";

    $stmt = $con->prepare($sql);

    $stmt->bindParam(":Email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":Nick", $nick, PDO::PARAM_STR);
    $stmt->bindParam(":Contrasena", $contrasenaHash, PDO::PARAM_STR);

    $stmt->execute();
}

function comprobarCorreo($con, $email){

    $sql = 'SELECT COUNT(*) as numCorreos FROM `usuario` WHERE email = "'.$email.'" GROUP BY nick';

    $consulta = $con->prepare($sql);
    $consulta->execute();
    $comprobacion = $consulta->fetchAll();
    return $comprobacion;
}