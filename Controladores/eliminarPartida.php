<?php

    include_once './Modelos/connectaBD.php';
    $con = connectaBD();

    include_once './Modelos/juego.php';
    $pGuardadas = getPartidaGuardadaByJugador($con, $_SESSION['usuario']);

    include_once './Modelos/NuevoJuego.php';
    //guardarPartidaUsuario($con, $_SESSION['usuario'], NULL);
    actUsuario($con, $_SESSION['usuario']);

    eliminarPartida($con, $pGuardadas[0][$_SESSION['id']]);

