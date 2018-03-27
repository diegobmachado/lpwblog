<?php
session_start();
require_once('conexao.php');

if(isset($_SESSION['nome'])){
	$id = $_GET['id'];
	$sql = 'SELECT * FROM posts WHERE id = '.$id;
	$res = pg_query($conexao, $sql);
	if($res != false){
		if(pg_num_rows($res) != 0){
			$res = pg_fetch_assoc($res);
		}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title><?php echo $res['titulo']; ?></title>
	</head>

	<body>
	<h1><?php echo $res['titulo']; ?></h1>
	<article>
	<?php
	echo $res['data'].'<br>';
	echo $res['descricao'];
	?>
	</article>
	<a href="index.php">voltar</a>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</body>

	</html>
	<?php
}else{
	header('Location:index.php');
}