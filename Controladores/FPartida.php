<?php
function countJugadores()
{
    if(isset($_SESSION["jugadores"][2]))
    {
        if(isset($_SESSION["jugadores"][3]))
        {
            return 4;
        }
        else{return  3;}
    }
    else{return 2;}
}
function finish1Tablero()
{
    if($_SESSION["fVuelta"][0])
    {
        if($_SESSION["fVuelta"][1])
        {
            if($_SESSION["fVuelta"][2])
            {
                if($_SESSION["fVuelta"][3])
                {
                    return TRUE;
                }
                else {return FALSE;}
            }
            else {return FALSE;}
        }
        else {return FALSE;}
    }
    else {return FALSE;}
}

include_once './Modelos/connectaBD.php';
$con = connectaBD();

include_once './Modelos/juego.php';

if(finish1Tablero())
{
    $_SESSION["pGuardada"]['idTablero'] = 2;
    $_SESSION["pGuardada"]['turnoJugador'] = 1;

    actTablero($con, $_SESSION["pGuardada"]['idPGuardada']);
}
else
{
    $_SESSION["pGuardada"]['turnoJugador'] = ($_SESSION["pGuardada"]['turnoJugador'] + 1 > countJugadores())? 1:$_SESSION["pGuardada"]['turnoJugador'] += 1;

    if($_SESSION["fVuelta"][$_SESSION["pGuardada"]['turnoJugador'] - 1])
    {
        $_SESSION["pGuardada"]['turnoJugador'] = ($_SESSION["pGuardada"]['turnoJugador'] + 1 > countJugadores())? 1:$_SESSION["pGuardada"]['turnoJugador'] += 1;

        if($_SESSION["fVuelta"][$_SESSION["pGuardada"]['turnoJugador'] - 1])
        {
            $_SESSION["pGuardada"]['turnoJugador'] = ($_SESSION["pGuardada"]['turnoJugador'] + 1 > countJugadores())? 1:$_SESSION["pGuardada"]['turnoJugador'] += 1;

            if($_SESSION["fVuelta"][$_SESSION["pGuardada"]['turnoJugador'] - 1])
            {
                $_SESSION["pGuardada"]['turnoJugador'] = ($_SESSION["pGuardada"]['turnoJugador'] + 1 > countJugadores())? 1:$_SESSION["pGuardada"]['turnoJugador'] += 1;
            }
        }
    }
}
//print_r($_SESSION["pGuardada"]['turnoJugador']);

actTurnoJugador($con, $_SESSION["pGuardada"]['idPGuardada'],$_SESSION["pGuardada"]['turnoJugador']) ;

include_once  './Vistas/juego.php';

