<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$dest = " ";
	if(isset($_GET['dest'])) {$accio=$_GET['dest'];}

switch ($accio) {
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


exit;
?>

