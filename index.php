<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="verification" content="164f15048bfa8506066798028a505210" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="per/css1.css" type="text/css" rel="stylesheet">
	<title>Home | Steph Hoel</title>
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
	<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "index.php");
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
			<span style="font-size:48px;text-align:center;font-family:bookmanOldStyleRegular;text-transform: none;">
			<a href="/blog.php">Último Post</a>
			</span>
			<br><br>
			<span style="font-size:18px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<?php posts($conexao, 1, ""); ?>
			</span>


			<a href="http://www.clixsense.com/?8275588" target=_blank>
				<img src="http://csstatic.com/banners/clixsense468x60h.png" border=0>
			</a>
			<br><br><hr>


			<span style="font-size:48px;text-align:center;" class="menuSelect">
			<a href="/videos.php">Último Vídeo</a></span>
			<br><br>
			<?php videoYoutube($conexao, 0, 1); ?>

			<hr><br>
			<a href="http://www.clixsense.com/?8275588" target=_blank>
				<img src="http://csstatic.com/banners/clixsense468x60e.gif" border=0>
			</a>
			<br><br>

		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->

</body></center></html>