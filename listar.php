<?php
	include('classes/Conexao.php');
	$usuarios = Conexao::selecionar('*', 'usuarios');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Usuários</title>

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

	<table>
		<thead>
			<th>ID</th>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Idade</th>
			<th colspan="2">Ações</th>
		</thead>
		<tbody>
			<?php
				if ($usuarios->rowCount() > 0) {
					foreach ($usuarios as $usuario) {
						echo '<tr>';
							echo "<td>".$usuario['id']."</td>";
							echo "<td>".$usuario['nome']."</td>";
							echo "<td>".$usuario['sobrenome']."</td>";
							echo "<td>".$usuario['idade']."</td>";
							echo "<td><a href='editar.php?id=".$usuario['id']."'>Editar</a></td>";
							echo "<td><a href='excluir.php?id=".$usuario['id']."'>Excluir</a></td>";
						echo '</tr>';
					}
				} else {
					echo "<tr><td colspan='5' style='font-style: italic;'>Nenhum usuário encontrado</td></tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>
