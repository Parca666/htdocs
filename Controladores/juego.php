<?php
    if(!isset($_SESSION['id']))
    {
        header('Refresh: 2; URL=index.php');
    }
    else
    {
        include_once './Modelos/connectaBD.php';
        $con = connectaBD();

        include_once './Modelos/juego.php';
        $pGuardada = getPartidaGuardada($con, $_SESSION["partida"]);

        $_SESSION["pGuardada"] = $pGuardada[0];
        //print_r($_SESSION["pGuardada" ]);

        $jugador1 = getJugador($con,$_SESSION["pGuardada"]['idJugador1']);
        $jugador2 = isset($_SESSION["pGuardada"]['idJugador2'])?  getJugador($con,$_SESSION["pGuardada"]['idJugador2']) : NULL;
        $jugador3 = isset($_SESSION["pGuardada"]['idJugador3'])?  getJugador($con,$_SESSION["pGuardada"]['idJugador3']) : NULL;
        $jugador4 = isset($_SESSION["pGuardada"]['idJugador4'])?  getJugador($con,$_SESSION["pGuardada"]['idJugador4']) : NULL;

        $_SESSION["jugadores"] = array($jugador1, $jugador2, $jugador3, $jugador4);


        //print_r(count(array_filter($_SESSION["jugadores"], function ($x){return !empty($x);}), $mode = COUNT_NORMAL));

       include_once  './Vistas/juego.php';


    }