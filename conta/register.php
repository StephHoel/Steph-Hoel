<?php include("conexao.php"); //include("../per/log.php"); salvaLog($_SESSION['login'].": Adicionando usuario", "contas/register.php");

	$login=$_POST['UserName'];
	$senha=$_POST['UserPass'];
	$sql=mysql_query("SELECT * FROM login WHERE login='$login' and senha='$senha'") or die (mysql_error());
	$row=mysql_num_rows($sql);
	
	if ($row != 0){
	die("UserExist");
	} else {
	mysql_query("INSERT INTO login(login, senha) VALUES ('$login', '$senha')");
	die("Registred");
	 }


?>