<?php
    session_start();

	$accion = " ";
	if(isset($_GET['dest'])) {$accion=$_GET['dest'];}

    if(isset($_GET['id'])) {$_SESSION['id']=$_GET['id'];}



	if(isset($_SESSION['usuario']))
	{
		switch ($accion)
		{
            case 'juego':
                include __DIR__.'/recursoJuego.php';
                break;
			case 'IniP':
				include __DIR__.'/recursoLogin.php';
				break;
            case 'nJuego':
                include __DIR__.'/recursoNJuego.php';
                break;
			default:
				include __DIR__.'/recursoMenuJuego.php';
				break;
		}
	}
	else
	{
		switch ($accion) {
			case 'registro':
				include __DIR__.'/recursoRegistro.php';
				break;
			case 'login':
				include __DIR__.'/recursoLogin.php';
				break;
			default:
				include __DIR__.'/recursoPortada.php';
				break;
		}
	}



	exit;


