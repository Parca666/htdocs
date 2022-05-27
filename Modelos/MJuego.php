<?php
    function getPartidasGuardadas($con, $id)
    {
        $sql = 'SELECT `idPartidaGuardada1`,`idPartidaGuardada2`,`idPartidaGuardada3`,`idPartidaGuardada4`,`idPartidaGuardada5` FROM `usuario` WHERE `idUsuario`= "' .$id. '"';

        $consulta = $con->prepare($sql);
        $consulta->execute();
        return($consulta->fetchAll());
    }