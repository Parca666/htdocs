<?php
function insertarJugador($con,$nombreBanda)
{
    $idCasilla = 1;
    $fama =  1;
    $repercusion = 1;
    $ingresos = 0;
    $costes = 0;
    $dinero = 1000;

    try
    {
        $sql = 'INSERT INTO `jugador` (`idJugador`, `idCasilla`, `nombreBanda`, `fama`, `repercusion`, `ingresos`, `costes`, `dinero`) 
            VALUES (NULL, '.$idCasilla.', :nombreBanda, '.$fama.', '.$repercusion.', '.$ingresos.', '.$costes.', '.$dinero.')';

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":nombreBanda", $nombreBanda, PDO::PARAM_STR);


        $stmt->execute();

    }
    catch (PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

}

function buscarJugador($con, $idCasilla, $nombreBanda, $fama, $repercusion, $ingresos, $costes, $dinero)
{
    $sql = "SELECT `idJugador` FROM `jugador`
            WHERE `nombreBanda` = '$nombreBanda' AND `idCasilla` = '$idCasilla' AND `fama`= '$fama' AND `repercusion`= '$repercusion'
              AND `ingresos`= '$ingresos' AND `costes`= '$costes' AND `dinero`= '$dinero' LIMIT 1 ";

    //echo $nombreBanda;
    //$sql = "SELECT `idJugador` FROM `jugador` WHERE `nombreBanda` = '$nombreBanda'";

    $stmt = $con->prepare($sql);
   // $stmt->bindParam(":nombreBanda", $nombreBanda, PDO::PARAM_STR);


    $stmt->execute();
    $idJugador = $stmt->fetchAll();
    ////print_r($idJugador);

    return ($idJugador);
}

function crearPartida($con, array $idJugadores)
{
    $idTablero = 1;

    ////print_r($idJugadores);
    $idJ1 =  $idJugadores[0][0]["idJugador"];
    $idJ2 = $idJugadores[1][0]["idJugador"];
    $idJ3 = $idJugadores[2][0]["idJugador"];
    $idJ4 = $idJugadores[3][0]["idJugador"];

    try
    {
        if(isset($idJ4))
        {
            $sql = 'INSERT INTO `partidaguardada` (`idPGuardada`, `idTablero`, `idJugador1`, `idJugador2`, `idJugador3`, `idJugador4`) 
                VALUES (NULL, '.$idTablero.', '.$idJ1.', '.$idJ2.', '.$idJ3.', '.$idJ4.')';
        }
        elseif (isset($idJ3))
        {
            $sql = 'INSERT INTO `partidaguardada` (`idPGuardada`, `idTablero`, `idJugador1`, `idJugador2`, `idJugador3`, `idJugador4`) 
                VALUES (NULL, '.$idTablero.', '.$idJ1.', '.$idJ2.', '.$idJ3.', NULL)';
        }
        elseif (isset($idJ2))
        {
            $sql = 'INSERT INTO `partidaguardada` (`idPGuardada`, `idTablero`, `idJugador1`, `idJugador2`, `idJugador3`, `idJugador4`) 
                VALUES (NULL, '.$idTablero.', '.$idJ1.', '.$idJ2.', NULL, NULL)';
        }
        else
        {
            $sql = 'INSERT INTO `partidaguardada` (`idPGuardada`, `idTablero`, `idJugador1`, `idJugador2`, `idJugador3`, `idJugador4`) 
                VALUES (NULL, '.$idTablero.', '.$idJ1.', NULL, NULL, NULL)';
        }

        $stmt = $con->prepare($sql);
        $stmt->execute();

    }
    catch (PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
}
function getIDPGuardada($con, array $idJugadores)
{
    //print_r($idJugadores);
    $idJ1 =  $idJugadores[0][0]["idJugador"];
    $idJ2 = $idJugadores[1][0]["idJugador"];
    $idJ3 = $idJugadores[2][0]["idJugador"];
    $idJ4 = $idJugadores[3][0]["idJugador"];

    try
    {
        if(isset($idJ4))
        {
            $sql = "SELECT `idPGuardada` FROM `partidaguardada` 
                     WHERE `idJugador1` = '$idJ1' AND `idJugador2` = '$idJ2' AND `idJugador3`= '$idJ3' 
                     AND `idJugador4`= '$idJ4'";
        }
        elseif (isset($idJ3))
        {
            $sql = "SELECT `idPGuardada` FROM `partidaguardada` 
                     WHERE `idJugador1` = '$idJ1' AND `idJugador2` = '$idJ2' AND `idJugador3`= '$idJ3'";
        }
        elseif (isset($idJ2))
        {
            $sql = "SELECT `idPGuardada` FROM `partidaguardada` 
                     WHERE `idJugador1` = '$idJ1' AND `idJugador2` = '$idJ2'";
        }
        else
        {
            $sql = "SELECT `idPGuardada` FROM `partidaguardada` 
                     WHERE `idJugador1` = '$idJ1'";
        }
        //print_r($sql);
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $idPGuardada = $stmt->fetchAll();
        return ($idPGuardada);

    }
    catch (PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
}


function guardarPartidaUsuario($con, $idUsuario, $idPGuardada)
{
    //print_r($idUsuario);
    switch ($_SESSION['id'])
    {
        case 1:
            $sql = 'UPDATE `usuario` 
                    SET idPartidaGuardada1= "'.$idPGuardada.'"
                    WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        case 2:
            $sql = 'UPDATE `usuario` 
                    SET idPartidaGuardada2= "'.$idPGuardada.'"
                    WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        case 3:
            $sql = 'UPDATE `usuario` 
                    SET idPartidaGuardada3= "'.$idPGuardada.'"
                    WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        case 4:
            $sql = 'UPDATE `usuario` 
                    SET idPartidaGuardada4= "'.$idPGuardada.'"
                    WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        default:
            $sql = 'UPDATE `usuario` 
                    SET idPartidaGuardada5= "'.$idPGuardada.'"
                    WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
    }
    //print_r($sql);
    $stmt = $con->prepare($sql);

    $stmt->execute();
}




