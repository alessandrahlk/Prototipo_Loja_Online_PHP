<!--Projeto 2 - PHP / Nome:Alessandra-->
<?php
	include_once("settings/setting.php");
	@session_start();

	if(isset($_SESSION['nome']) && isset($_SESSION['usuario'])){
		header('Location: logado.php');
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
		</form></center>
		</div>

		<div id="Esquerda">
			<h1>Logar:</h1>
			<?php
			if(isset($_POST['entrar']) && $_POST['entrar'] == "login"){
				$usuario = $_POST['usuario'];
				$senha = $_POST['senha'];
				$hash_senha = md5($senha);

				if(empty($usuario) || empty($senha)){
					echo "<h2>ERRO: Preencha todos os campos.</h2>";
				}else{
					$query = "SELECT nome, usuario, senha FROM usuarios WHERE usuario = '$usuario' AND senha = '$hash_senha'";
					$result = mysqli_query($conecta,$query);
					$busca = mysqli_num_rows($result);
					$linha = mysqli_fetch_assoc($result);

					if($busca > 0){
						$_SESSION['nome'] = $linha['nome'];
						$_SESSION['usuario'] = $linha['usuario'];
						header('Location: logado.php');
						exit;
					}else{
						echo "<h2>ERRO: Usuário ou senha inválidos.</h2>";
					}
				}
			}

		?>
			<center><form action="" method="POST" enctype="multipart/form-data">
				<p><input type="text" name="usuario" id="usuario" placeholder="Usuário"></p>
				<p><input type="password" name="senha" id="senha" placeholder="*********"></p>
				<p><input type="submit" value="Entrar"/></p>
				<input type="hidden" name="entrar" value="login">
				<p><a href="cadastro.php" style="text-decoration:underline;font-weight: bold;" >Cadastre-se</a></p>
			</form></center>

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

		<div id="Meio">
			<h1>Cadastre-se</h1>

			<?php
				if(isset($_POST['cadastrar']) && $_POST['cadastrar'] == "register"){
					$nome = $_POST['nome'];
					$usuario = $_POST['usuario'];
					$senha = $_POST['senha'];
					$email = $_POST['email'];
					$endereco = $_POST['endereco'];

					//hash md5
					$hash_senha = md5($senha);

					if(empty($nome) || empty($usuario) || empty($senha) || empty($email) || empty($endereco)){
						echo "<h2>ERRO: Preencha todos os campos.</h2>";
						}else{
							$query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
							$result = mysqli_query($conecta,$query);
							$conta = mysqli_num_rows($result);
							$busca = mysqli_fetch_assoc($result);

							$query2 = "SELECT * FROM usuarios WHERE email = '$email'";
							$result2 = mysqli_query($conecta,$query2);
							$conta2 = mysqli_num_rows($result2);
							$busca2 = mysqli_fetch_assoc($result2);

					if($conta > 0){
						echo "<h2>ERRO: Usuário já cadastrado, insira outro usuário.</h2>";
						}else if($conta2 > 0){
							echo "<h2>ERRO: Email já cadastrado, insira outro email.</h2>";}
						else{
							$cadastrar = "INSERT INTO usuarios (nome, usuario, senha,email,endereco) VALUES ('$nome', '$usuario', '$hash_senha','$email','$endereco')";
							if(mysqli_query($conecta,$cadastrar)){
								echo "Cadastro efetuado com sucesso.<br></br>";
								echo "Seus dados inseridos no banco de dados são: </br>";
								echo "Nome: ".$nome."</b></br>";
								echo "Usuário: ".$usuario."</br>";
								echo "Senha: ".$senha."</b></br>";
								echo "email: ".$email."</b></br>";
								echo "Endereço: ".$endereco."</b></br>";

						}else{
						echo "Erro.";}}}}?>

			<form action="" method="POST" enctype="multipart/form-data">
				<p><label>Nome</label></br> <input type="text" name="nome" id="nome" placeholder="Insira seu nome" size=60/></p>
				<p><label>Usuário</label></br> <input type="text" name="usuario" id="usuario" placeholder="Insira seu usuário" size=60/></p>
				<p><label>Senha</label></br> <input type="password" name="senha" id="senha" placeholder="Insira sua senha" size=60/></p>
				<p><label>Email</label></br> <input type="text" name="email" id="email" placeholder="Insira seu email" size=60/></p>
				<p><label>Endereço</label></br> <input type="text" name="endereco" id="endereco" placeholder="Insira o endereço" size=60/></p>
				<center><p><input type="submit" value="Cadastrar"/></p></center>
				<input type="hidden" name="cadastrar" value="register"/>
			</form>

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
