<!DOCTYPE html>
<html lang="es">
    <body>
        <section id=formulario>
            <form action="../index.php?dest=registro" target="_self" method="post">
                <p>Nick</p> <input type="text" maxlength="20" name="Nick" required ><br />
                <p>Correo electrónico</p> <input type="email"  maxlength="25" name="Email" required ><br />
                <p>Contraseña</p> <input type="password" minlength="5" name="Contraseña" placeholder="5 carácteres o más"  required><br />
                <p><input type="checkbox" name="validar" required> Acepto los términos y condiciones del servicio.</p><br />
                <p>Al registrarme, confirmo que he leído y acepto los Términos y condiciones y la Política de Privacidad de LM. </p>

                <input type="reset" value="LIMPIAR">
                <input type="submit" value="ACEPTAR"><br />
            </form>
        </section>
        <div id="errMsg">
            <?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } ?>
        </div>
        <?php unset($_SESSION['errMsg']); ?>
    </body>
</html>