<?php function PGuardadasVista($pGuardadas)
{
    $id = 4;
    //print_r($pGuardadas);
    ?>


    <?php while ($id >= 0) : ?>
        <div class="PGuardada">
            <?php if($pGuardadas[$id] == NULL)
                { ?>
                    <form action="../index.php?dest=nJuego&id=<?= $id + 1 ?>" id="<?= $id + 1 ?>" target="_self" method="post">
                        <input type="submit" class="nuevaPartida" value="Crear Partida">
                    </form>
               <?php }
                else
                {?>

                    <button class="cJuego" id="<?= $id + 1 ?>" onclick="cargarPartida(<?= $id + 1 ?>)" > Cargar Partida </button>
                    <button class="eJuego" id="<?= $id + 1  ?>" onclick="eliminarPartida(<?= $id + 1  ?>)"> X </button>

                <?php } ?>

        </div>
<?php
        $id = $id -1;
    endwhile;
}?>
