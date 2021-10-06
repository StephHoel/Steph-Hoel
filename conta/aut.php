<?php

$database="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
$dbname="u313230586_conta"; // BASE DE DADOS 
$usuario="u313230586_steph"; // USUÁRIO DO MYSQL
$dbsenha="hoelbriegel96"; // SENHA DO MYSQL

$conexao=mysql_connect ($database, $usuario, $dbsenha);
if($conexao){
	if (mysql_select_db($dbname, $conexao)){
		session_start(login);
		if ((isset($_SESSION['login']) || isset($_SESSION['senha']))){ set_time_limit (60*60*2); include("../per/log.php"); salvaLog("Autenticando ".$_SESSION['login'], "contas/aut.php");
			}else{ header('Location: index.php'); }
				}else{ print "Não foi possível selecionar o Banco de Dados"; }
		}else{ print "Erro ao conectar o MySQL"; }
?>