<?php

	$accion = " ";
	if(isset($_GET['dest'])) {$accion=$_GET['dest'];}

	session_start();

	if(isset($_SESSION['usuario']))
	{
		switch ($accion)
		{
			case 'IniP':
				include __DIR__.'/recursoLogin.php';
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


