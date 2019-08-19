<?php
	include('classes/Conexao.php');
	
	$id = $_GET['id'];

	$usuario = Conexao::selecionar('*', 'usuarios', 'id', '=', $id);

	if (!is_a($usuario, 'PDOException')) {
		$usuario = $usuario->fetch();
	}

	if (count($_POST) > 0) {
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$idade = $_POST['idade'];

		$atualizacao_nome = Conexao::atualizar('usuarios', 'nome', $nome, 'id', '=', $id);
		$atualizacao_sobrenome = Conexao::atualizar('usuarios', 'sobrenome', $sobrenome, 'id', '=', $id);
		$atualizacao_idade = Conexao::atualizar('usuarios', 'idade', $idade, 'id', '=', $id);

		if (!is_a($atualizacao_nome, 'PDOException') 
			&& !is_a($atualizacao_sobrenome, 'PDOException') 
			&& !is_a($atualizacao_idade, 'PDOException')) 
		{
			$msgSucesso = "Atualizado com sucesso!";

			// atualiza a busca
			$usuario = Conexao::selecionar('*', 'usuarios', 'id', '=', $id)->fetch();
		} else {
			$msgErro = "Erro!";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editando Usuário</title>

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
			echo $msgSucesso;
		} else if (isset($msgErro)) {
			echo $msgErro;
		}
	?>

	<form method="POST">
		<input type="hidden" name="id" value="<?php echo $usuario['id'] ?>"><br>
		<input type="text" name="nome" value="<?php echo $usuario['nome'] ?>"><br>
		<input type="text" name="sobrenome" value="<?php echo $usuario['sobrenome'] ?>"><br>
		<input type="number" name="idade" value="<?php echo $usuario['idade'] ?>"><br>

		<input type="submit">
	</form>
</body>
</html>