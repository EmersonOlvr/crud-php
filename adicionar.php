<?php
	include_once('classes/Conexao.php');

	if (count($_POST) > 0) {
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$idade = !empty($_POST['idade']) ? $_POST['idade'] : null;

		$insercao = Conexao::inserir('usuarios', 'nome, sobrenome, idade', [$nome, $sobrenome, $idade]);

		if (!is_a($insercao, 'PDOException')) {
			$msgSucesso = "Cadastrado com sucesso!";
		} else {
			$msgErro = "Erro: ".$insercao->getMessage();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Usuário</title>

	<style type="text/css">
		li {
		  display: inline;
		}
	</style>
</head>
<body>
	<header>
		<ul>
			<li><a href="listar.php">Listar</a></li>
			<li><a href="adicionar.php">Adicionar</a></li>
		</ul>
	</header>

	<?php
		if (isset($msgSucesso)) {
			echo "<p>$msgSucesso</p>";
		} else if (isset($msgErro)) {
			echo "<p>$msgErro</p>";
		}
	?>
	<form method="POST">
		Nome: <input type="text" name="nome" required><br>
		Sobrenome: <input type="text" name="sobrenome" required><br>
		Idade: <input type="number" name="idade"><br>
		<input type="submit">
	</form>
</body>
</html>