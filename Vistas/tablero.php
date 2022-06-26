<?php function tablero ($posJ1, $posJ2, $posJ3, $posJ4){
    //print_r($posJ1);
   //print_r($posJ2);
    //print_r($posJ3);
    //print_r($posJ4);
    ?>

    <style >
        #j1 > p{
            left: <?= $posJ1[0]?>%;
            top: <?= $posJ1[1]?>%;
        }

        #j2 > p{
            background-color: aqua;
            left: <?= $posJ2[0]?>%;
            top:<?= $posJ2[1]?>%;
        }

        #j3 > p{
            background-color: #FF3E3E;
            left: <?= $posJ3[0]?>%;
            top:<?= $posJ3[1]?>%;
        }

        #j4 > p {
            background-color: chartreuse;
            left: <?= $posJ4[0]?>%;
            top:<?= $posJ4[1]?>%;
        }
    </style>


    <div class="tablero">
        <img src="/img/juego/tablero<?=$_SESSION["pGuardada"]['idTablero']?>.png" alt="Tablero">
        <div class="jugador" id="j1" > <p>J1 </p></div>
        <div class="jugador" id="j2" style="display: <?= isset($_SESSION["jugadores"][1])? "block":"none"?>" > <p>J2</p> </div>
        <div class="jugador" id="j3" style="display: <?= isset($_SESSION["jugadores"][2])? "block":"none"?>;  left: <?= $posJ3[0]?>; top: <?= $posJ3[1]?>"> <p>J3</p> </div>
        <div class="jugador" id="j4" style="display: <?= isset($_SESSION["jugadores"][3])? "block":"none"?>; left: <?= $posJ4[0]?>; top: <?= $posJ4[1]?>"> <p>J4</p> </div>
    </div>
<?php } ?>