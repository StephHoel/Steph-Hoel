<?php
   
$host = "mysql.hostinger.com.br"; 
$database="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
$dbname="u313230586_carpe"; // BASE DE DADOS 
$usuario="u313230586_libri"; // USUÁRIO DO MYSQL
$dbsenha="datacl2015"; // SENHA DO MYSQL

//("myhost","myuser","mypassw","mybd")

$conexao = mysqli_connect($host, $usuario, $dbsenha, $dbname);
if($conexao){
	if (mysqli_select_db($conexao, $dbname)){ print "";
	}else{ print "Não foi possível selecionar Banco de Dados"; }
}else{ print "Erro ao conectar MySQL do CL"; }


?>