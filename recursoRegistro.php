<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Registro en LM</title>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/log.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <script type="text/javascript" src="lib/jquery.js"> </script>
    <script type="text/javascript" src="js/funcionesJS.js"> </script>
</head>

    <body>
        <header>
            <?php require __DIR__.'/Controladores/header.php'; ?>
        </header>

        <div class="container">
            <?php require __DIR__.'/Controladores/registro.php'; ?>
        </div>
    </body>

    <footer>
        <?php require __DIR__.'/Controladores/footer.php'; ?>
    </footer>
</html>

