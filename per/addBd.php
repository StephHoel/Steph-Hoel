<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Add BD | Steph Hoel</title>
</head> 

<body>

<?php
	include ("functions.php");
	//videoUrl={{Url}}&videoTitulo={{Title}}&autorizacao={{AuthorName}}

	/*
	url
	titulo
	data
	*/

	if($_GET['autorizacao'] == "Steph Hoel" || $_GET['autorizacao'] == "Steph Yui Hoel") {
		$videoUrl = $_GET['videoUrl'];
		$videoTitulo = $_GET['videoTitulo'];
		$videoData = date("Y-m-d");
		$videoAutor = $_GET['autorizacao'];

		$urlCortado = explode("/", $videoUrl);
		if ($urlCortado[2] == "youtu.be"){
			$videoUrlAtual =$urlCortado[3];
		} else{
			$urlCortadoAtual = explode("=", $urlCortado[3]);
			$urlCortadoAtual1 = explode("&", $urlCortadoAtual[1]);

			$videoUrlAtual = $urlCortadoAtual1[0];
		}

		echo enviaVideo($conexao, $videoTitulo, $videoUrlAtual, $videoData, $videoAutor);
		//echo "Adicionado ao Banco de Dados!<br>".$aviso0;
		echo $aviso0."<br>";
		echo "Título: ".$videoTitulo. "<br>URL: " . $videoUrlAtual. "<br>Data: " . $videoData. "<br>Canal: " . $_GET['autorizacao'];
	} else echo "Sem autorizacao";





?>

</body></html>