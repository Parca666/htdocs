<?php
    session_start();

	$accion = " ";
	if(isset($_GET['dest'])) {$accion=$_GET['dest'];}

    if(isset($_GET['id'])) {$_SESSION['id']=$_GET['id'];}

    if(isset($_GET['nDado'])){$_SESSION['nDado']=$_GET['nDado'];}else{$_SESSION['nDado'] = 0;}



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
            case 'actStats':
                include __DIR__. '/recursoActStats.php';
                break;
            case 'cJuego':
                include __DIR__.'/recursoCargarPartida.php';
                break;
            case 'eJuego':
                include __DIR__.'/recursoEliminarPartida.php';;
                break;
            case 'EiGame':
                include __DIR__.'/recursoElementosInGame.php';
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


