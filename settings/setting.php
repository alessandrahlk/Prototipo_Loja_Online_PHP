<?php

	//Dados do servidor
	$host = "localhost";
	$login = "root";
	$senha = "";
	$banco = "usuarios";

	//Efetuando a conexão
	$conecta = mysqli_connect($host, $login, $senha, $banco) or print (mysql_error());
	mysqli_set_charset($conecta,'utf8');
	//mysql_select_db($banco, $conecta) or print(mysql_query());


	//Verificação
	if(!mysqli_connect($host, $login, $senha, $banco)){
		echo "Erro ao conectar ao banco de dados.";
	}

?>
