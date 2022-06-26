<?php

function getPartidaGuardada($con, $idPGuardada)
{
    $sql = " SELECT * FROM `partidaguardada` 
             WHERE `idPGuardada` = '$idPGuardada'";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $pGuardada = $stmt->fetchAll();
    return ($pGuardada);

}

function getPartidaGuardadaByJugador($con, $idUsuario)
{
    $sql =" SELECT `idPartidaGuardada1`, `idPartidaGuardada2`, `idPartidaGuardada3`, `idPartidaGuardada4`, `idPartidaGuardada5` FROM `usuario`
            WHERE `idUsuario` = '$idUsuario'";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $pGuardada = $stmt->fetchAll();
    return ($pGuardada);
}

function eliminarPartida($con, $idPGuardada)
{
    $sql = " DELETE FROM `partidaGuardada` WHERE `idPGuardada` = '$idPGuardada'";

    $stmt = $con->prepare($sql);
    $stmt->execute();
}

function actUsuario($con, $idUsuario)
{
    switch ($_SESSION['id'])
    {
        case 0:
            $sql = 'UPDATE `usuario` 
                SET idPartidaGuardada1= NULL
                WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        case 1:
            $sql = 'UPDATE `usuario` 
                SET idPartidaGuardada2= NULL
                WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        case 2:
            $sql = 'UPDATE `usuario` 
                SET idPartidaGuardada3= NULL
                WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        case 3:
            $sql = 'UPDATE `usuario` 
                SET idPartidaGuardada4= NULL
                WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
        default:
            $sql = 'UPDATE `usuario` 
                SET idPartidaGuardada5= NULL
                WHERE `idUsuario` = "'.$idUsuario.'" ';
            break;
    }
    $stmt = $con->prepare($sql);

    $stmt->execute();

}

function getJugador($con, $idJugador)
{
    $sql = " SELECT * FROM `jugador` 
             WHERE `idJugador` = '$idJugador'";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $jugador = $stmt->fetchAll();
    return ($jugador);
}
function getCasillasFortuna($con)
{
    $sql = "SELECT * FROM `casillafortuna`";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $casillas = $stmt->fetchAll();
    return ($casillas);
}

function getCasillaFama($con)
{
    $sql = "SELECT * FROM `casillafama`";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $casillas = $stmt->fetchAll();
    return ($casillas);

}

function getCasillaEleccion($con)
{
    $sql = "SELECT * FROM `casillaeleccion`";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $casillas = $stmt->fetchAll();
    return ($casillas);

}

function getCasillaSuerte($con)
{
    $sql = "SELECT * FROM `casillasuerte`";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $casillas = $stmt->fetchAll();
    return ($casillas);

}

function getCasillaEsquina($con)
{
    $sql = "SELECT * FROM `casillaesquina`";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $casillas = $stmt->fetchAll();
    return ($casillas);
}

function actUsuarioStats($con, $idJugador, $idCasilla, $fama, $repercusion, $ingresos, $costes, $dinero)
{
    try {
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $sql = 'UPDATE `jugador` 
                    SET idCasilla= "' . $idCasilla . '", fama= "' . $fama . '", repercusion= "' . $repercusion . '", ingresos= "' . $ingresos . '", costes= "' . $costes . '", dinero= "' . $dinero . '" 
                    WHERE `idJugador` = "' . $idJugador . '" ';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        //echo $stmt->rowCount() . " records UPDATED successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function getItembyID($con, $idItem)
{
    $sql = "SELECT * FROM `item` WHERE `idItem` = '$idItem'";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $item = $stmt->fetchAll();
    return ($item);
}

function actTurnoJugador($con, $idPartida, $turnoJugador)
{
    try
    {
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'UPDATE `partidaguardada` SET turnoJugador= "'.$turnoJugador.'"  WHERE `idPGuardada`= "'. $idPartida .'"';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        //echo $stmt->rowCount() . " records UPDATED successfully";

    }catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

}

function actTablero($con, $idPartida)
{

    try
    {
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE `partidaguardada` SET idTablero= 2, turnoJugador= 1  WHERE `idPGuardada`= "'. $idPartida .'"';

        $stmt = $con->prepare($sql);

        $stmt->execute();

        //echo $stmt->rowCount() . " records UPDATED successfully";

    }catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

}