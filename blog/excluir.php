<?php
session_start();
require_once('conexao.php');

$id = $_GET['id'];

$sql = 'DELETE FROM posts WHERE id = '.$id;

$res = pg_query($conexao, $sql);

if($res != false){
	if(pg_affected_rows($res) != 0){
		header('Location: index.php');
	}
}