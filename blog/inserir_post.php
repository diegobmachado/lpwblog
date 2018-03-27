<?php
session_start();
require_once('conexao.php');

$titulo 	= $_POST['titulo'];
$descricao 	= $_POST['descricao'];
$data 		= $_POST['data'];

$sql = 'INSERT INTO posts (titulo, descricao, data) 
		VALUES (\''.$titulo.'\', \''.$descricao.'\', \''.$data.'\')';

$res = pg_query($conexao, $sql);

if($res != false){
	if(pg_affected_rows($res) != 0){
		header('Location: index.php');
	}
}