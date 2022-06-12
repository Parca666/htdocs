<!DOCTYPE html>
<html lang="es">
    <body class="log">
    <section id=formulario>
        <form action="../index.php?dest=nJuego&id=<?=$_SESSION['id'] ?>" target="_self" method="post">
            <div class="mImp">
                <p> Tiene que haber mínimo 2 jugadores</p>
            </div>

            <div class="jugador1">
                <img class="imgF" src="/img/bandas/foto1.png" width="500" height="500">
                <p class="nbT">Nombre de la banda</p> <input type="text" maxlength="20" name="nombreBanda1" required ><br />
                <input type="checkbox" name="1" required>
            </div>

            <div class="Jugador2">
                <img class="imgF" src="/img/bandas/foto2.png" width="500" height="500">
                <p class="nbT">Nombre de la banda</p> <input type="text" maxlength="20" name="nombreBanda2" required ><br />
                <input type="checkbox" name="2" required>
            </div>

            <div class="Jugador3">
                <img class="imgF" src="/img/bandas/foto3.png" width="500" height="500">
                <p class="nbT">Nombre de la banda</p> <input type="text" maxlength="20" name="nombreBanda3" ><br />
                <input type="checkbox" name="3" >
            </div>

            <div class="Jugador4">
                <img class="imgF" src="/img/bandas/foto4.png" width="500" height="500">
                <p class="nbT">Nombre de la banda</p> <input type="text" maxlength="20" name="nombreBanda4" ><br />
                <input type="checkbox" name="4" >
            </div>

            <input class="bCPartida" type="submit" value="CREAR PARTIDA"><br />
        </form>
    </section>
    <div id="errMsg">
        <?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
    </div>
    <?php unset($_SESSION['errMsg']); ?>
    </body>
</html>