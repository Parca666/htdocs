<?php

include_once './Modelos/connectaBD.php';

$con = connectaBD();

include_once './Modelos/juego.php';

$jugador = $_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0];

// Inicializar variables
$Fama = 1;
$Repercusion = 1;
$Ingresos = 0;
$Costes = 0;
$Dinero = 0;

//print_r($_SESSION['casilla']);

if(!isset($_SESSION["item"]))
{
    $Fama = isset($_SESSION['casilla']['Fama'])? $_SESSION['casilla']['Fama'] * $jugador['fama']:$jugador['fama'];
    $Repercusion = isset($_SESSION['casilla']['Repercusion'])? $_SESSION['casilla']['Repercusion'] * $jugador['repercusion']:$jugador['repercusion'];
    $Ingresos = isset($_SESSION['casilla']['Ingresos'])? $_SESSION['casilla']['Ingresos'] + $jugador['ingresos']:$jugador['ingresos'];
    $Costes = isset($_SESSION['casilla']['Coste'])? $_SESSION['casilla']['Coste'] + $jugador['costes']:$jugador['costes'];
    $Dinero = isset($_SESSION['casilla']['Dinero'])? $_SESSION['casilla']['Dinero'] + $jugador['dinero']:$jugador['dinero'];


}
else
{
    //$item = getItembyID($con, $_SESSION["casilla"]['idItem1']);

    $Fama =$_SESSION["item"]['fama'] * $jugador['fama'];
    $Repercusion = $jugador['repercusion'];
    $Ingresos = $_SESSION["item"]['ingresos'] + $jugador['ingresos'];
    $Costes =$_SESSION["item"]['coste'] + $jugador['costes'];
    $Dinero = $jugador['dinero'];

    addRelacionItemJugador($con, $_SESSION["item"]['idItem'], $jugador['idJugador']);

    $_SESSION["item"] = NULL;



}

actUsuarioStats($con, $jugador['idJugador'], $jugador['idCasilla'] + $_SESSION["nDado"],
    $Fama, $Repercusion, $Ingresos, $Costes, $Dinero);

$_SESSION["nDado"] = null;

//print_r($_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]);

$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['fama'] = $Fama;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['repercusion'] = $Repercusion;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['ingresos'] = $Ingresos;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['costes'] = $Costes;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['dinero'] = $Dinero;

//print_r($_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]);


include_once './Vistas/juego.php';






