<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="per/css1.css" type="text/css" rel="stylesheet">
	<title>Textos | Steph Hoel</title>
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
	<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "textos.php");
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
			<br>

			<span style="font-size:24px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			Aqui estarão registrados alguns dos textos que eu escrevi, entre histórias originais e histórias baseadas em universos registrados. Links em breve.
			</span>
			<br><br><br><br>
			<span style="font-size:28px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<b>Pedras Preciosas</b><br>
			</span>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<u>Original</u><br>
			Conta a história de duas irmãs que precisam cuidar da casa e trabalhar para se sustentarem, enquanto diversos acontecimentos as atrapalham... Ou ajudam.
			</span>
			<br><br><br>
			<span style="font-size:28px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<b>Yui</b><br>
			</span>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<u>Baseada em outra obra (fanfic)</u><br>
			Os registros da vida de uma garota diferente da maioria. Com poderes fora do comum, Yui conta sua vida e suas aventuras nessa coletânia de páginas soltas do seu diário.
			</span>


			<br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>
			<br><br><br><br><br>

			<br>

		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->

</body></center></html>