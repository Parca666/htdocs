<?php
function getPosFicha($jugador, $dado, $posL, $posT, $incL=12, $incT=14)
{
    //print_r($jugador);
    $posF =  $jugador[0]['idCasilla'];

    if(isset($dado)){$posF += $dado;}
    if($posF > 20){ $posF  = 1; $_SESSION["fVuelta"][$_SESSION["pGuardada"]['turnoJugador'] - 1] = TRUE;}


    if($posF < 7 ){
        $posL = $posL - ($incL*($posF-1));
    }
    else{
        if($posF < 12){
            $posL = $posL - 5*$incL;
            $posT = $posT - ($incT*($posF-6));
        }
        else{
            $posL = $posL - 5*$incL; $posT = $posT - 5*$incT;
            if($posF < 17)
            {
                $posL = $posL + ($incL*($posF-11));
            }
            else{
                $posL = $posL + 5*$incL;
                $posT = $posT + ($incT*($posF-16));
            }
        }
    }
    //print_r(array($posL, $posT));

    return (array($posL, $posT, $posF));
}


if($_GET['tipo'] == "tablero")
{

    include_once './Vistas/tablero.php';

    //print_r($_SESSION["pGuardada"]['turnoJugador']);
    //print_r($_SESSION["nDado"]);

    switch ($_SESSION["pGuardada"]['turnoJugador'])
    {
        case 1:
            $posJ = getPosFicha($_SESSION["jugadores"][0], $_SESSION["nDado"], 77, 84);
            $_SESSION["jugadores"][0][0]['idCasilla'] = $posJ[2];

            tablero($posJ,
                    getPosFicha($_SESSION["jugadores"][1], NULL, 81, 81, 14),
                    isset($_SESSION["jugadores"][2])? getPosFicha($_SESSION["jugadores"][2], NULL, 85, 78, 15, 13):array(0,0),
                    isset($_SESSION["jugadores"][3])? getPosFicha($_SESSION["jugadores"][3], NULL, 85, 75, 15):array(0,0)
            );
            break;

        case 2:
            $posJ = getPosFicha($_SESSION["jugadores"][2], $_SESSION["nDado"], 81, 81, 14);
            $_SESSION["jugadores"][1][0]['idCasilla'] = $posJ[2];

            tablero(getPosFicha($_SESSION["jugadores"][0], NULL, 77, 84),
                $posJ,
                isset($_SESSION["jugadores"][2])? getPosFicha($_SESSION["jugadores"][2], NULL, 85, 78, 15, 13):array(0,0),
                isset($_SESSION["jugadores"][3])? getPosFicha($_SESSION["jugadores"][3], NULL, 85, 75, 15):array(0,0)
            );
            break;

        case 3:
            $posJ = getPosFicha($_SESSION["jugadores"][2], $_SESSION["nDado"], 85, 78, 15, 13);
            $_SESSION["jugadores"][2][0]['idCasilla'] = $posJ[2];

            tablero(getPosFicha($_SESSION["jugadores"][0], NULL, 77, 84),
                getPosFicha($_SESSION["jugadores"][2], NULL, 81, 81, 14),
                isset($_SESSION["jugadores"][2])? $posJ:array(0,0),
                isset($_SESSION["jugadores"][3])? getPosFicha($_SESSION["jugadores"][3], NULL, 85, 75, 15):array(0,0)
            );
            break;
        case 4:
            $posJ = getPosFicha($_SESSION["jugadores"][3], $_SESSION["nDado"], 85, 75, 15);
            $_SESSION["jugadores"][3][0]['idCasilla'] = $posJ[2];

            tablero(getPosFicha($_SESSION["jugadores"][0], NULL, 77, 84),
                getPosFicha($_SESSION["jugadores"][2], NULL, 81, 81, 14),
                isset($_SESSION["jugadores"][2])? getPosFicha($_SESSION["jugadores"][2], NULL, 85, 78, 15, 13):array(0,0),
                isset($_SESSION["jugadores"][3])? $posJ:array(0,0)
            );
            break;
    }

}
elseif($_GET['tipo'] == "escenario")
{
    include_once './Vistas/escenario.php';
}

elseif ($_GET['tipo'] == "carta")
{
    include_once './Modelos/connectaBD.php';
    $con = connectaBD();

    include_once './Modelos/juego.php';
    $casilla = "";
    $posJugador = $_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0]['idCasilla'];

    include_once './Vistas/carta.php';


    switch (($posJugador- 1)%5)
    {
        case 0:
            $casilla =  getCasillaEsquina($con);
            //print_r($casilla);
            break;
        case 1:
            $casilla = getCasillasFortuna($con);
            $_SESSION["casilla"] = $casilla[rand(1, count($casilla) - 1)];
            templateCasilla($_SESSION["casilla"]);

            //print_r($casilla);
            break;
        case 2:
            $casilla = getCasillaSuerte($con);
            $_SESSION["casilla"] = $casilla[rand(1, count($casilla) - 1)];
            templateCasilla($_SESSION["casilla"]);
            break;
        case 3:
            $casilla = getCasillaEleccion($con);
            $_SESSION["casilla"] = $casilla[rand(1, count($casilla) - 1)];
            eleccionCasilla($_SESSION["casilla"]);
            break;
        case 4:
            $casilla = getCasillaFama($con);
            $_SESSION["casilla"] = $casilla[rand(1, count($casilla) - 1)];
            templateCasilla($_SESSION["casilla"]);
            break;


    }




}
