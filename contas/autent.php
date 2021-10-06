<?php
	require("conexao.php"); 
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	$sql=mysql_query("SELECT * FROM login WHERE login='$login' and senha='$senha'") or die (mysql_error());
	$row=mysql_num_rows($sql);
	
	if ($row>0){
	session_start(login);
	$_SESSION['login']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	include("../per/log.php"); salvaLog("Fazendo login de ".$_SESSION['login'], "contas/autent.php");
	header("Location: gerenciador.php");
	} else { ?>
	<script>if(confirm("Login e/ou Senha invalidos, tente novamente")){window.location.href='index.php'} else {window.location.href='index.php'} </script>
	<?php } ?>