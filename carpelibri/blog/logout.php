<?php session_start();
		include("trans/log.php"); salvaLog($_SESSION['login'].": Fazendo logout", "allBlog/logout.php");
		session_destroy();
		header('Location: ../index.php'); ?>