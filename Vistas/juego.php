<!-- <?php print_r($_SESSION["jugadores"])?></p>
<p><?php print_r($_SESSION["pGuardada"])?></p>  -->

<iframe id="tableroFrame" class="tablero" title="Tablero" width="900" height="900" src="index.php?dest=EiGame&tipo=tablero"></iframe>

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
    <button id="btTirarDados" onclick="tirarDados(<?=$_SESSION["pGuardada"]['idTablero']?>, <?=$_SESSION["pGuardada"]['turnoJugador']?>, 1)"> Tirara dados </button>
    <button> Hacer Intercambio </button>
    <img src="/img/logo/logoInventario.png">
    <button id="bFinalizarTurno"> Finalizar Turno</button>
</div>


<iframe class="escenario" title="Escenario" width="700" height="550" src="index.php?dest=EiGame&tipo=escenario"></iframe>




<div class="dados" id="divDados" style="display: none">
    <img id="dado1" src="/img/juego/dados/rand.svg" >
    <img id="dado2" src="<?php if($_SESSION["pGuardada"]['idTablero'] == 2){ echo("/img/juego/dados/rand.svg");}?>">
</div>
<div>
    <iframe id="cartaFrame" class="carta" title="Carta" width="900" height="500" src="index.php?dest=EiGame&tipo=carta&id=1"></iframe>
    <button id="cPopUp" onclick="actStats()"> X</button>
</div>




