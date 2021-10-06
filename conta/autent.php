<?php
	require("conexao.php"); 
	$login=$_POST['UserName'];
	$senha=$_POST['UserPass'];
	$sql=mysql_query("SELECT * FROM login WHERE login='$login' and senha='$senha'") or die (mysql_error());
	$row=mysql_num_rows($sql);
	
	if ($row != 0){
	//session_start(login);
	//$_SESSION['login']=$_POST['login'];
	//$_SESSION['senha']=$_POST['senha'];
	//include("../per/log.php"); salvaLog("Fazendo login de ".$_SESSION['login'], "contas/autent.php");
	die("Logined");
	} else {
	die("Invalid");
	 }

 ?>