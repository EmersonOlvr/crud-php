<?php
	include_once('classes/Conexao.php');

	$id = $_GET['id'];

	$exclusao = Conexao::deletar('usuarios', 'id', '=', $id);

	if (!is_a($exclusao, 'PDOException')) {
		$msgSucesso = 'Sucesso!';
	} else {
		$msgErro = 'Erro!';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exclusão de Usuário</title>
</head>
<body>
	<?php
		if (isset($msgSucesso)) {
			echo "<p>$msgSucesso</p>";
		} else if (isset($msgErro)) {
			echo "<p>$msgErro</p>";
		}
	?>
	
	<a href="listar.php">Listar Usuários</a>
</body>
</html>