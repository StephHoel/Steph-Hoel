<?php include("conexao.php"); include("log.php");

	session_start(login);
	if ((isset($_SESSION['login']) || isset($_SESSION['senha']))){
	set_time_limit (60*60*2); salvaLog("Autenticando ".$_SESSION['login'], "allBlog/trans/autentica.php");
	}else{
	header('Location: ../index.php');
	} 
?>