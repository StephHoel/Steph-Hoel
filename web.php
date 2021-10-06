<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
	<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "web.php");
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
			<span style="font-size:48px;text-align:center;">Feitos por mim</span>
				<br><br>
			<span style="font-size:24px;text-align:center;font-family:bookmanOldStyleRegular;text-transform: none;">
				<!-- <a href="" target="_blank">Hogwarts Online</a> -->
				<strong>Hogwarts Online [link em breve]</strong>
				<br>
				<span style="font-size:18px;text-transform: none;">
				RPG baseado no universo fantástico de Harry Potter;
				utiliza HTML, CSS, PHP e banco de dados; produzido para aprendizagem;
				layout próprio; sem fins financeiros e/ou comerciais.
				</span>
				<br><br>
				<a href="/" target="_blank"><strong>Steph Hoel</strong></a>
				<br>
				<span style="font-size:18px;text-transform: none;">
				Site para exposição de todos os trabalhos produzidos por Stephanye Hoelbriegel;
				utiliza HTML, CSS, PHP e banco de dados; layout próprio.
				</span>
				<br><br>
				<br><br>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>