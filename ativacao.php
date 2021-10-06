<?php
	$host = "mysql.hostinger.com.br"; 
	$database="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
	$dbname="u313230586_portf"; // BASE DE DADOS 
	$usuario="u313230586_hoel"; // USUÁRIO DO MYSQL
	$dbsenha="portfoliohoel"; // SENHA DO MYSQL
	
	$conexao = mysqli_connect($host, $usuario, $dbsenha, $dbname);

	$email = $_GET['email'];
	$insert = "UPDATE `login` SET `status`='ativo' WHERE `email`=$email";
	$query  = mysqli_query($conexao, $insert) or die(mysqli_error($conexao));
	
	header ("Location: /");
?>