<?php function templateCasilla($casilla)
{
    //print_r($casilla['Titulo']);?>
<body id="cartaCuerpo">
    <div class="cartaPopUp">
        <div class="titulo"> <?= $casilla['Titulo'] ?> </div>
        <div class ="descripcion"> <?= $casilla['Descripcion'] ?> </div>
        <?php if(isset($casilla['Fama']))
        { ?>
            <div class="stat"> Fama: <?= $casilla['Fama'] ?> </div>
        <?php } ?>

        <?php if(isset($casilla['Dinero']))
        { ?>
            <div class="stat"> Dinero: <?= $casilla['Coste'] ?> </div>
        <?php } ?>


        <?php if(isset($casilla['Ingresos']))
        { ?>
            <div class="stat"> Ingresos: <?= $casilla['Ingresos'] ?> </div>
        <?php } ?>
        <?php if(isset($casilla['Coste']))
        { ?>
            <div class="stat"> Costes: -<?= $casilla['Coste'] ?> </div>
        <?php } ?>

    </div>
</body>
    <?php
}

function eleccionCasilla($casilla)
{ ?>
    <body id="cartaCuerpo">
        <div class="cartaPopUp">
            <div class="titulo"> <?= $casilla['Titulo'] ?> </div>
            <div class ="descripcion"> <?= $casilla['Descripcion'] ?> </div>

            <div class="item" id="item1">
                <img src="<?= $casilla['idItem1']['img']?>" >
                <p> <?= $casilla['idItem1']['nombre']?> </p>
                <button class="elegirItem"> Escoger este objeto </button>
            </div>

            <div class="item" id="item2">
                <img src="<?= $casilla['idItem2']['img']?>" >
                <p> <?= $casilla['idItem2']['nombre']?></p>
                <button class="elegirItem"> Escoger este objeto </button>
            </div>

        </div>
    </body>
    <?php
} ?>
