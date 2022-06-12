<!-- <?php print_r($_SESSION["jugadores"])?></p>
<p><?php print_r($_SESSION["pGuardada"])?></p>  -->

<div class="tablero">
    <img src="/img/juego/tablero<?=$_SESSION["pGuardada"]['idTablero']?>.png" alt="Tablero">
</div>

<div class="containerStats">
    <?php $jugador = $_SESSION["jugadores"][$_SESSION["pGuardada"]['turnoJugador'] - 1][0] ?>
    <p> <?= $jugador['nombreBanda'] ?> </p>

    <div class="stats" >
        <p class="fama"> Fama: <?= $jugador['fama'] ?> </p>

        <p class="repercusion"> Repercusión: <?= $jugador['repercusion'] ?> </p>

        <p class="ingresos"> Ingresos: <?= $jugador['ingresos'] ?> </p>

        <p class="coste"> Costes: <?= $jugador['costes'] ?> </p>

        <p class="dinero"> Mucoins: <?= $jugador['dinero'] ?> </p>
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



