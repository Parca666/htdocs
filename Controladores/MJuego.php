<?php

    require_once './Modelos/connectaBD.php';
    $con = connectaBD();

    require_once './Modelos/MJuego.php';
    $pGuardadas = getPartidasGuardadas($con, $_SESSION['usuario']);

   //print_r($pGuardadas[0]);

    require_once './Vistas/MJuego.php';
    PGuardadasVista($pGuardadas[0]);

