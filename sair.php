<!--Projeto 2 - PHP / Nomes: Alessandra e Mike-->
<?php
		//Removendo dados da sessão
		@session_start();
		session_destroy();
		unset($_SESSION);
		header('Location: index.php');
		exit;
?>