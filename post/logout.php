<?php require("../per/functions.php");
		session_start();
		$user = $_SESSION['user'];
		//include("trans/log.php"); salvaLog($_SESSION['login'].": Fazendo logout", "allBlog/logout.php");
		logout($conexao, $user);
		session_destroy();
		header('Location: /login.php'); ?>