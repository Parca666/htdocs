<!DOCTYPE html>
    <html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Leyendas de la música</title>
        <link rel="stylesheet" type="text/css" href="css/header.css" />
        <link rel="stylesheet" type="text/css" href="css/juego.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />
        <script type="text/javascript" src="lib/jquery.js"> </script>
        <script type="text/javascript" src="js/funcionesJS.js"> </script>
    </head>

    <header>
        <?php require __DIR__.'/Controladores/header.php'; ?>
    </header>
    <body>


    <div class="juego">
        <?php require __DIR__.'/Controladores/juego.php'; ?>
    </div>
    </body>

    <footer>
        <?php require __DIR__.'/Controladores/footer.php'; ?>
    </footer>
</html>