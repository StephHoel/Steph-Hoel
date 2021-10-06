<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vídeos | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
	<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "videos.php");
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
			<span style="font-size:48px;text-align:center;">Vídeos recentes</span>
			<br><br>
			<?php videoYoutube($conexao, 0, 15); ?>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>