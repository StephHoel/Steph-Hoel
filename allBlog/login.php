<?php require ("trans/conexao.php");
if ($_POST['make'] == "entrar"){
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	$sql=mysql_query("SELECT * FROM login WHERE user='$login' and pass='$senha'") or die (mysql_error());
	$row=mysql_num_rows($sql);
	if ($row==1){
		session_start(login);
		$_SESSION['login']=$_POST['login'];
		$_SESSION['senha']=$_POST['senha'];
		$_SESSION['menu'] ="yes";
		
		include("trans/log.php"); salvaLog($_SESSION['login'].": Fazendo login", "allBlog/login.php");
		
		header("Location: index.php");
	}
} else {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
<title>Home</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
  <table><tr><td>
  
 	<center><h2>Login</h2></center>
  	<form action="" method="post">
	<table width="150">
	<tr><td width="100">Usu&aacute;rio:</td><td width="50"><input type="text" name="login" id="user" /></td></tr>
	<tr><td>Senha:</td><td><input type="password" name="senha" id="pass" /></td></tr>
	</table>
	<center><input type="hidden" name="make" value="entrar" />
    <input type="submit" value="Entrar" /></center>
  </form>
  </td></tr></table>
  </center>
</body></html>

<?php } ?>
