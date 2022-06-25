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

if(!isset($_SESSION["casilla"]['idItem1']))
{
    $Fama = isset($_SESSION['casilla']['Fama'])? $_SESSION['casilla']['Fama'] * $jugador['fama']:$jugador['fama'];
    $Repercusion = isset($_SESSION['casilla']['Repercusion'])? $_SESSION['casilla']['Repercusion'] * $jugador['repercusion']:$jugador['repercusion'];
    $Ingresos = isset($_SESSION['casilla']['Ingresos'])? $_SESSION['casilla']['Ingresos'] + $jugador['ingresos']:$jugador['ingresos'];
    $Costes = isset($_SESSION['casilla']['Coste'])? $_SESSION['casilla']['Coste'] + $jugador['costes']:$jugador['costes'];
    $Dinero = isset($_SESSION['casilla']['Dinero'])? $_SESSION['casilla']['Dinero'] + $jugador['dinero']:$jugador['dinero'];


}
else
{
    $item = getItembyID($con, $_SESSION["casilla"]['idItem1']);

    $Fama = isset($item[0]['Fama'])? $item[0]['Fama'] * $jugador['fama']:$jugador['fama'];
    $Repercusion = isset($item[0]['Repercusion'])? $item[0]['Repercusion'] * $jugador['repercusion']:$jugador['repercusion'];
    $Ingresos = isset($item[0]['Ingresos'])? $item[0]['Ingresos'] + $jugador['ingresos']:$jugador['ingresos'];
    $Costes = isset($item[0]['Coste'])? $item[0]['Coste'] + $jugador['costes']:$jugador['costes'];
    $Dinero = isset($item[0]['Dinero'])? $item[0]['Dinero'] + $jugador['dinero']:$jugador['dinero'];

}

actUsuarioStats($con, $jugador['idJugador'], $jugador['idCasilla'] + $_SESSION["nDado"],
    $Fama, $Repercusion, $Ingresos, $Costes, $Dinero);

$_SESSION["nDado"] = null;

//print_r($_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['Fama']);

$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['fama'] = $Fama;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['repercusion'] = $Repercusion;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['ingresos'] = $Ingresos;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['costes'] = $Costes;
$_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['dinero'] = $Dinero;

//print_r($_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]);


include_once './Vistas/juego.php';






