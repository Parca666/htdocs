<?php

    require './Modelos/connectaBD.php';
    $con = connectaBD();

    require './Modelos/MJuego.php';
    $pGuardadas = getPartidasGuardadas($con, $_SESSION['usuario']);

   //print_r($pGuardadas[0]);

    require './Vistas/MJuego.php';
    PGuardadasVista($pGuardadas[0]);

