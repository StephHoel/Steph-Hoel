<?php include("conexao.php");

	session_start(login);
	if (isset($_SESSION['login'])){
		session_cache_expire(120);
		
		//set_time_limit(60*60*2); //60 * 60 = 3600 * 2 = 7200
	}else{
		header('Location: ../../');
	} 
?>