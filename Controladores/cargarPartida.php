<?php

    include_once './Modelos/connectaBD.php';

    $con = connectaBD();

    include_once './Modelos/juego.php';

    $pGuardadas = getPartidaGuardadaByJugador($con, $_SESSION['usuario']);
    $_SESSION['partida'] = $pGuardadas[0][$_SESSION['id']];

    $_SESSION["fVuelta"] = array(FALSE, !isset($_SESSION["pGuardada"]['idJugador2']), ! isset($_SESSION["pGuardada"]['idJugador3']), ! isset($_SESSION["pGuardada"]['idJugador4']));


    //print_r($_SESSION);





