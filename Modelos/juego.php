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

function getJugador($con, $idJugador)
{
    $sql = " SELECT * FROM `jugador` 
             WHERE `idJugador` = '$idJugador'";

    $stmt = $con->prepare($sql);
    $stmt->execute();

    $jugador = $stmt->fetchAll();
    return ($jugador);
}