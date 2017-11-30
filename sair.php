<!--Projeto 2 - PHP / Nome: Alessandra-->
<?php
		//Removendo dados da sessão
		@session_start();
		session_destroy();
		unset($_SESSION);
		header('Location: index.php');
		exit;
?>