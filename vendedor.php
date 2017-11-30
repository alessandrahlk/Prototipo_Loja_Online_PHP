<!--Projeto 2 - PHP / Nomes: Alessandra e Mike-->
<?php
	include_once("settings/setting.php");
	@session_start();

	$nome = $_SESSION['nome'];
	$usuario = $_SESSION['usuario'];

		if($usuario != 'vendedor'){
		header('Location: index.php');
		exit;
	}

	if(!isset($_SESSION['nome']) && !isset($_SESSION['usuario'])){
		header('Location: index.php');
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

		<center>
		<h1>Cadastro de categorias</h1>

			<?php
			// Se o usuário clicou no botão cadastrar efetua as ações
			if (isset($_POST['cadastrocat'])) {

			// Recupera os dados dos campos
			$nome = $_POST['nome'];
			if(empty($nome)){
				echo "<h2>ERRO: Preencha todos os campos.</h2>";
				}else{

					$query = "SELECT * FROM categorias WHERE categorias = '$nome'";
					$result = mysqli_query($conecta,$query);
					$conta = mysqli_num_rows($result);
					$busca = mysqli_fetch_assoc($result);
				if($conta > 0){
				echo "<h2>ERRO: Categoria já cadastrada, insira outra categoria.</h2>";
				}else{
					$sql = mysqli_query($conecta,"INSERT INTO categorias VALUES ('".$nome."')");

			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<h2>Categoria cadastrada com sucesso.</h2>";
		}}}}?>

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="Cadastrar" >
			Nome da categoria:<br />
			<input type="text" name="nome" /><br/></br>
			<input type="submit" name="cadastrocat" value="Cadastrar" />
			</form>
			</center>
		<h1>Cadastro de produtos</h1>

			<?php
			// Se o usuário clicou no botão cadastrar efetua as ações
			if (isset($_POST['cadastrar'])) {

			// Recupera os dados dos campos
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$descricao = $_POST['descricao'];
			$categoria = $_POST['categoria'];
			$foto = $_FILES["foto"];

			if(empty($nome) || empty($preco) || empty($descricao) || empty($categoria) || empty($foto["name"])){
			echo "<h2>ERRO: Preencha todos os campos. / Escreva corretamente a categoria (letra minúscula).</h2>";
			}else{

			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);

			// Insere os dados no banco
		$sql = mysqli_query($conecta,"INSERT INTO produtos VALUES ('".$nome_imagem."','".$nome."', '".$preco."', '".$descricao."','".$categoria."')");

		if ($sql){
				echo "<h2>Produto cadastrado com sucesso.</h2>";
			}}}
?>

			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
			Foto :<br />
			<input type="file" name="foto"/><br/><br/>
			Nome:<br />
			<input type="text" name="nome" /><br/><br/>
			Preço:<br />
			<input type="text" name="preco" /><br/><br/>
			Descrição:<br />
			<input type="text" name="descricao"/><br /><br/>
			Categoria:<br />
			<input type="text" name="categoria"/><br/><br/>

	<input type="submit" name="cadastrar" value="Cadastrar"/>
	</form>
			</center>

			  <center>
		   <div class="pre-spoiler">
				<h1>Produtos Cadastrados</h1><input id="xs" value="Mostrar" onclick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = '';this.innerText = ''; this.value = 'Ocultar'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.value = 'Mostrar';}" type="button"> </div>
				<div>
				<br/>
			<div class="spoiler" style="display: none;">


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

		</div>

    </div></center>
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
			Autores: Alessandra e Mike,
			04/06/2017.
			</p>
		</div>
	</div>
</body>

</html>
