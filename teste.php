<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teste | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php include ("per/functions.php"); include("uni.php");?>
</head> 

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Página de Testes</span>
			<br><br>

			<textarea name="post" class="jqte-test"></textarea>
				<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">
				<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">
				<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
				<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>
				<script>$(".jqte-test").jqte();</script>
			<br><br>

			<?php
				$ArrPATH = explode("/",$_SERVER['SCRIPT_NAME']);
				$PATH = $ArrPATH[count($ArrPATH)-1];
				if($PATH == "teste.php"){
					echo "Você está na página Teste!";
				} else echo "Sem resposta";
			?>

			<br><br>
			<?php

				$url="https://www.youtube.com/watch?v=btZX2Odu9ts&feature=youtu.be";
				$urlCortado = explode("/", $url);
				$urlCortadoAtual = explode("=", $urlCortado[3]);
				$urlCortadoAtual1 = explode("&", $urlCortadoAtual[1]);
				echo "Parte que interessa: ".$urlCortadoAtual1[0]."<br>";


			?>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>