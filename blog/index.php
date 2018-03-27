<?php
session_start();
require_once('conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<title>Blog Pessoal</title>
</head>

<body>
<?php
if(isset($_SESSION['nome'])){
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="inserir.php">Inserir novo post</a>
				</li>
			</ul>
			<a class="nav-link" href="logout.php">Logout</a>
		</div>
	</nav>
	<table class="table table-striped table-bordered">
		<tbody>	
		<?php
		$sql = 'SELECT * FROM posts';
		$res = pg_query($conexao, $sql);
		if($res != false){
			if(pg_num_rows($res) != 0){
				$res = pg_fetch_all($res);

				foreach ($res as $linha) {
					echo '<tr>';
					echo '<td><a href="post.php?id='.$linha['id'].'">';
					echo $linha['data'].' - '.$linha['titulo'];
					echo '</a></td>';
					echo '<td><a class="btn btn-success" href="editar.php?id='.$linha['id'].'">';
					echo 'Editar post</a></td>';
					echo '<td><a class="btn btn-danger"href="excluir.php?id='.$linha['id'].'">';
					echo 'Excluir post</a></td>';
					echo '</tr>';
				}
			}
		}
		?>
		</tbody>
	</table>
	<?php
}else{
	?>
	<center>
		<form action="login.php" method="post">
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" name="email" id="email">
			</div>
			<div class="form-group">
				<label for="email">Senha</label>
				<input type="password" class="form-control" name="senha" id="senha">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</center>
	<?php
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>