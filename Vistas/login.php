<!DOCTYPE html>
<html lang="es">

    <body>
        <section id="formulario">
            <form action="index.php?accio=login" target="_self" method="post">
                <p>Usuario </p> <input type="email" maxlength="25" name="Correo" required><br />
                <p>Contraseña</p> <input type="password" minlength="5" name="Contraseña" required><br /> <br />
                <input type="reset" value="LIMPIAR">
                <input type="submit" value="ACEPTAR"><br/>
            </form>
        </section>
        <div id="errMsg">
            <?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
        </div>
        <?php unset($_SESSION['errMsg']); ?>
    </body>
</html>