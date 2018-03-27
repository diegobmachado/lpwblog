<?php
session_start();
require_once('conexao.php');
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
<title>Editando <?php echo $res['titulo']; ?></title>
</head>

<body>
<?php
if(isset($_SESSION['nome'])){
	?>
	<center>
		<form action="editar_post.php" method="post">
				<input type="hidden" class="form-control" name="id" id="id"
				value="<?php echo $res['id']; ?>">
			<div class="form-group">
				<label for="email">Título</label>
				<input type="text" class="form-control" name="titulo" id="titulo"
				value="<?php echo $res['titulo']; ?>">
			</div>
			<div class="form-group">
				<label for="descricao">Descrição</label>
				<input type="text" class="form-control" name="descricao" id="descricao"
				value="<?php echo $res['descricao']; ?>">
			</div>
			<div class="form-group">
				<label for="data">Data</label>
				<input type="text" class="form-control" name="data" id="data"
				value="<?php echo $res['data']; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Editar post</button>
		</form>
	</center>
	<?php
}else{
	header('Location:index.php');
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>