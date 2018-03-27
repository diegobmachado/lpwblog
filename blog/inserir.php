<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<title>Inserir novo post</title>
</head>

<body>
<?php
if(isset($_SESSION['nome'])){
	?>
	<center>
		<form action="inserir_post.php" method="post">
			<div class="form-group">
				<label for="email">Título</label>
				<input type="text" class="form-control" name="titulo" id="titulo">
			</div>
			<div class="form-group">
				<label for="email">Descrição</label>
				<input type="text" class="form-control" name="descricao" id="descricao">
			</div>
			<div class="form-group">
				<label for="email">Data</label>
				<input type="text" class="form-control" name="data" id="data">
			</div>
			<button type="submit" class="btn btn-primary">Inserir novo post</button>
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