<!--Projeto 2 - PHP / Nome:Alessandra-->
<?php
	include_once("settings/setting.php");
	@session_start();
?>

<html>

<head>
	<title>Projeto 2 - PHP</title>
	<link rel="stylesheet" type:"text/css" href="css/css4.css"/>
</head>

<body>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<div id="Tudo">
		<div id="Topo">Projeto 2 - PHP</div>

		<div id="Busca"><center>
				<form method="GET" action="busca.php">
					<input type="text" id="consulta" name="consulta" maxlength="255" size=105  placeholder="Pesquise pelo nome do produto"/ />
					<input type="submit" value="Buscar" />
				</form></center></div>

		<div id="Esquerda">
			<h1>Categorias:</h1>
				<ul>
					<?php
					// Seleciona as categorias
					$sql = mysqli_query($conecta,"SELECT * FROM categorias ORDER BY categorias ");
					// Exibe as categorias e gera os links
					while ($categorias = mysqli_fetch_object($sql)) {
						echo "<li><a href='categorias.php?nome=". $categorias->categorias ."'>". $categorias->categorias ."</a></li>";}?>
				</ul>

					<br/><h1><a href="index.php">Página inicial</a></h1>
		</div>

		<div id="Meio">
			<h1>Fale Conosco:</h1>
			<p>Sua mensagem foi enviada com sucesso!</p>
		</div>



		<div id="Fim">
			<p>
			<a href="Fale.php">Fale Conosco</a> /
			<a href="sobre.php">Sobre</a> /
			Autora: Alessandra Harumi,
			04/06/2017.

			</p>
		</div>
	</div>
</body>

</html>
