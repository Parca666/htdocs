<!-- <?php print_r($_SESSION["jugadores"])?></p>
<p><?php print_r($_SESSION["pGuardada"])?></p>  -->

<div class="tablero">
    <img src="/img/juego/tablero<?=$_SESSION["pGuardada"]['idTablero']?>.png" alt="Tablero">
    <div class="jugador" id="j1"> <p>J1 </p></div>
    <div class="jugador" id="j2" style="display: <?= isset($_SESSION["jugadores"][1])? "block":"none"?>"> <p>J2</p> </div>
    <div class="jugador" id="j3" style="display: <?= isset($_SESSION["jugadores"][2])? "block":"none"?>"> <p>J3</p> </div>
    <div class="jugador" id="j4" style="display: <?= isset($_SESSION["jugadores"][3])? "block":"none"?>"> <p>J4</p> </div>
</div>

<div class="containerStats">
    <?php $jugador = $_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0] ?>
    <p> <?= $jugador['nombreBanda'] ?> </p>

    <div class="stats" >
        <div class="fama"> Fama: <?= $jugador['fama'] ?> </div>

        <div class="ingresos"> Ingresos: <?= $jugador['ingresos'] ?> </div>

        <div class="repercusion"> Repercusión: <?= $jugador['repercusion'] ?> </div>

        <div class="coste"> Costes: <?= $jugador['costes'] ?> </div>

        <div class="dinero"> Mucoins: <?= $jugador['dinero'] ?> </div>
    </div>

</div>

<div class="containerButtoms">
    <button> Tirara dados </button>
    <button> Hacer Intercambio </button>
    <img src="/img/logo/logoInventario.png">
</div>

<div class="escenario">
    <img src="/img/juego/escenario.png" alt="Escenario">
</div>



