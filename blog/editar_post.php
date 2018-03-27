<?php
session_start();
require_once('conexao.php');

$id 		= $_POST['id'];
$titulo 	= $_POST['titulo'];
$descricao 	= $_POST['descricao'];
$data 		= $_POST['data'];

$sql = 'UPDATE posts SET titulo = \''.$titulo.'\', descricao = \''.$descricao.'\', data = \''.$data.'\' WHERE id = '.$id;

$res = pg_query($conexao, $sql);

if($res != false){
	if(pg_affected_rows($res) != 0){
		header('Location: post.php?id='.$id);
	}
}