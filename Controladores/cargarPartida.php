<?php

    include_once './Modelos/connectaBD.php';

    $con = connectaBD();

    include_once './Modelos/juego.php';

    $pGuardadas = getPartidaGuardadaByJugador($con, $_SESSION['usuario']);
    $_SESSION['partida'] = $pGuardadas[0][$_SESSION['id']];

    //print_r($_SESSION);





