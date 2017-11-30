<!--Projeto 2 - PHP / Nomes: Alessandra e Mike-->
<?php
	include_once("settings/setting.php");
	@session_start();
?>

<html>

<head>
	<title>Projeto 2 - PHP</title>
	<link rel="stylesheet" type:"text/css" href="css/css2.css"/>
</head>

<body>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<div id="Tudo">

		<div id="Topo">Projeto 2 - PHP</div>

		<div id="Busca"><center>
			<form method="GET" action="busca.php">
				<input type="text" id="consulta" name="consulta" maxlength="255" size=105  placeholder="Pesquise pelo nome do produto"/ />
				<input type="submit" value="Buscar" />
			</form></center>
		</div>

		<div id="Esquerda">
			<h1>Categorias:</h1>
			<ul>
				<?php
				// Seleciona todas as categorias
				$sql = mysqli_query($conecta,"SELECT * FROM categorias ORDER BY categorias ");
				// Exibe as categorias e gera os links
				while ($categorias = mysqli_fetch_object($sql)) {
					echo "<li><a href='categorias.php?nome=". $categorias->categorias ."'>". $categorias->categorias ."</a></li>";}?>
			</ul>

			<br/><h1><a href="index.php">Página inicial</a></h1>

		</div>

		<div id="Meio"><center>
			<h1>Resultados:</h1>
			<?php
			//Pega a palavra para buscar
			$busca = mysqli_real_escape_string($conecta,$_GET['consulta']);
			//Consulta os produtos com o nome que busca-se
			$sql = mysqli_query($conecta,"SELECT * FROM produtos WHERE nome LIKE '" . $busca."' ORDER BY nome");
			//Mostra os produtos com o nome que busca-se
			while ($produtos = mysqli_fetch_object($sql)) {
			echo "<img src='fotos/".$produtos->nome_imagem."' alt='Foto de exibição' /><br /><br />";
			echo "<b>Nome:</b> " . $produtos->nome . "<br />";
			echo "<b>Preço:</b> " . $produtos->preco ."<br />";
			echo "<b>Descrição:</b> " . $produtos->descricao . "<br />";
			echo "<b>Categoria:</b> " . $produtos->categoria . "<br /><br/>";}?>
		</div>

		<div id="Fim">
			<p>
			<a href="Fale.php">Fale Conosco</a> /
			<a href="sobre.php">Sobre</a> /
			Autores: Alessandra e Mike,
			04/06/2017.

			</p>
		</div>

	</div>
</body>

</html>
