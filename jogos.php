<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jogos | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "jogos.php");
		include ("per/functions.php");
		include("uni.php");
	?>
</head>

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Jogos - Unity3D</span>
			<br>
			<span style="font-size:15px;text-align:center;font-family:bookmanOldStyleRegular;text-transform: none;">
			Estes jogos só podem ser jogados no Firefox ou Opera!
			</span>
			<br><br><br>
			<?php //videoYoutube($conexao, 0, 15); ?>
			<span style="font-size:24px;text-align:center;font-family:bookmanOldStyleRegular;text-transform: none;">
			<a onclick="javascript:location.href='games/planetOfCircles'" target="_blank" style="font-size:24px; font-weight: bold;">Planet of Circles</a>
			<br>
			Os círculos querem dominar o mundo e sua missão é impedir!
			<br><br>
			<a onclick="javascript:location.href='games/game'" target="_blank" style="font-size:24px; font-weight: bold;">Game Experimental</a>
			<br>
			Teste sua sorte neste joguinho!
			<br><br>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>