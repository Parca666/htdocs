<?php

if($_POST == NULL)
{
    require_once('./Vistas/NuevoJuego.php');
}
else
{
    require './Modelos/connectaBD.php';
    $con = connectaBD();

    //print_r($_POST);

    //Coger Variables
    $nombreBandas = array($_POST["nombreBanda1"],$_POST["nombreBanda2"],$_POST["nombreBanda3"],$_POST["nombreBanda4"]);
    $check = array (isset($_POST["1"]),isset($_POST["2"]),isset($_POST["3"]),isset($_POST["4"]));

    //print_r($nombreBandas);    print_r($check);

    //Creamos las Bandas/Jugadores

    require './Modelos/NuevoJuego.php';

    $_SESSION["fVuelta"] = array(FALSE, TRUE, TRUE, TRUE);

    insertarJugador($con, $nombreBandas[0]);
    $check[0] = buscarJugador($con, 1, $nombreBandas[0], 1, 1, 0,0, 1000);

    if(isset($_POST["2"]))
    {
        insertarJugador($con, $nombreBandas[1]);
        $check[1] = buscarJugador($con, 1, $nombreBandas[1], 1, 1, 0,0, 1000);
        $_SESSION["fVuelta"][1] = FALSE;
    }
    else{ $check[1] = NULL;}

    if(isset($_POST["3"]))
    {
        insertarJugador($con, $nombreBandas[2]);
        $check[2] = buscarJugador($con, 1, $nombreBandas[2], 1, 1, 0,0, 1000);
        $_SESSION["fVuelta"][2] = FALSE;
    }
    else{ $check[2] = NULL;}

    if(isset($_POST["4"]))
    {
        insertarJugador($con, $nombreBandas[3]);
        $check[3] = buscarJugador($con, 1, $nombreBandas[3], 1, 1, 0,0, 1000);
        $_SESSION["fVuelta"][3] = FALSE;
    }
    else{ $check[3] = NULL;}

    //print_r($check);
    crearPartida($con, $check);

    $idPGuardada = getIDPGuardada($con, $check);
    //print_r($idPGuardada[0][0]);
    $_SESSION['partida'] = $idPGuardada[0][0];

    guardarPartidaUsuario($con, $_SESSION['usuario'], $idPGuardada[0][0]);

    header('Refresh: 2; URL=index.php?dest=juego');

}
