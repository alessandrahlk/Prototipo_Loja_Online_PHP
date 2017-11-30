<!--Projeto 2 - PHP / Nome: Alessandra-->
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
			<form action="/pagina-processa-dados-do-form" method="post">
				<div>
					<label for="nome">Nome:</label>
						<p></p>
					<input type="text" id="nome" />
				</div>
						<p></p>
				<div>
					<label for="Telefone">Telefone:</label>
						<p></p>
					<input type="text" id="Telefone" />
				</div>
						<p></p>
				<div>
					<label for="email">E-mail:</label>
						<p></p>
					<input type="email" id="email" />
				</div>
						<p></p>
				<div>
					<label for="msg">Mensagem:</label>
						<p></p>
					<textarea id="msg"></textarea>
				</div>
			</form>

			<form action="enviado.php" method="get">
			    <input type="submit" value="Enviar"
			      	name="Submit" id="frm1_submit" />
			</form>
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
