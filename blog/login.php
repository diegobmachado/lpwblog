<?php
session_start();
require_once('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = 'SELECT * FROM usuarios WHERE email = \''.$email.'\' AND senha = \''.$senha.'\'';
$res = pg_query($conexao, $sql);

if($res != false){
	if(pg_num_rows($res) != 0){
		$res = pg_fetch_assoc($res);
		echo '<pre>';
		print_r($res);
		echo '</pre>';

		$_SESSION['nome'] = $res['nome'];
		header('Location: index.php');
	}
}