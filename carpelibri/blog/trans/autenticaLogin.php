<?php 
include ("conexao.php");
if ($_POST){
	$login=$_POST['login'];
	$senha=$_POST['senha'];
	
	$sql=mysqli_query($conexao,"SELECT * FROM login WHERE user='$login' and pass='$senha'") or die (mysqli_error());
	$row=mysqli_num_rows($sql);
	
	if ($row==1){
		session_start(login);
		$_SESSION['login']=$_POST['login'];
		$_SESSION['senha']=$_POST['senha'];
		
		header("Location: ../post.php");
		//top.frames[menuRight].location.href = "trans/menu.php";
		//echo "Entrou";
		
	}
	
} else if ($_GET){
	$login = $_GET['login'];
	$senha = $_GET['pass'];
	//login=$login&pass=$senha
	
	$sql=mysqli_query($conexao,"SELECT * FROM login WHERE user='$login' and pass='$senha'") or die (mysqli_error());
	$row=mysqli_num_rows($sql);
	
	if ($row==1){
		session_start(login);
		$_SESSION['login']=$login;
		$_SESSION['senha']=$senha;
		
		//top.frames[menuRight].location.href = "trans/menu.php";
		//echo "Entrou";
		header("Location: ../post.php");
	}
	
} else header("Location: ../../");

?>