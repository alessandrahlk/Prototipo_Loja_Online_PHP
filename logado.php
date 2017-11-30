<!--Projeto 2 - PHP / Nome: Alessandra-->
<?php
	include_once("settings/setting.php");
	@session_start();

	$nome = $_SESSION['nome'];
	$usuario = $_SESSION['usuario'];


	if($usuario == 'vendedor'){
		header('Location: vendedor.php');
		exit;
	}

	else if(!isset($_SESSION['nome']) && !isset($_SESSION['usuario'])){
		//header('Location: index.php');
		exit;
	}

?>

<html>

<head>
	<title>Projeto 2 - PHP</title>
	<link rel="stylesheet" type:"text/css" href="css/css.css"/>
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
			<h1>Bem vindo</h1>

			 <center><p>Bem vindo(a) <?php echo $nome;?> <b>@<?php echo $usuario;?></b><br><a href="sair.php" style="text-decoration:underline;font-weight: bold;">Deslogar</a></center></p>

			<h1>Categorias:</h1>
				<ul>
					<?php
					// Seleciona as categorias
					$sql = mysqli_query($conecta,"SELECT * FROM categorias ORDER BY categorias ");
					// Exibe as categorias e gera os links
					while ($categorias = mysqli_fetch_object($sql)) {
						echo "<li><a href='categorias.php?nome=". $categorias->categorias ."'>". $categorias->categorias ."</a></li>";}?>
				</ul>
		</div>

		<div id="Meio"><center>
			<h1>Ofertas</h1><center>

				<?php
				// Seleciona todos os produtos
				$sql = mysqli_query($conecta,"SELECT * FROM produtos ORDER BY nome ");

				// Exibe os produtos
				while ($produtos = mysqli_fetch_object($sql)) {

					echo "<img src='fotos/".$produtos->nome_imagem."' alt='Foto de exibição' /><br /><br />";
					echo "<b>Nome:</b> " . $produtos->nome . "<br />";
					echo "<b>Preço:</b> " . $produtos->preco ."<br />";
					echo "<b>Descrição:</b> " . $produtos->descricao . "<br />";
					echo "<b>Categoria:</b> " . $produtos->categoria . "<br /><br/>";}?>

				</center>
		</div>

		<div id="Direita">
			<h1>Propaganda:</h1>
			<center>
			<a href="http://www.submarino.com.br/"><img src="imagens/submarino.jpg" width="180px" height="131px"></a><br><br>
			<a href="https://www.walmart.com.br/"><img src="imagens/walmart.png" width="180px" height="131px"></a><br></center>
		</div>
		<div id="Fim"><p>
			<a href="Fale.php">Fale Conosco</a> /
			<a href="sobre.php">Sobre</a> /
			Autora: Alessandra Harumi,
			04/06/2017.
			</p>
		</div>
	</div>
</body>

</html>
