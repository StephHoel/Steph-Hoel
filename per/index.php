<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="per/css1.css" type="text/css" rel="stylesheet">
	<title>Home | Steph Hoel</title>
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
	<?php include("per/log.php"); salvaLog("Visitante: Visualizando", "index.php"); include ("per/functions.php");?>
</head> 

<center><body>
<div class="corpo"> <!-- Corpo -->
	<div class="cabecalho"><!-- Cabeçalho -->
		Steph Hoel
	</div><!-- Fim do Cabeçalho -->

	<div class="menu"><!-- Menu -->
		<a href="/" style="margin-right:90px;"				>Home</a>
		<a href="videos.php" style="margin-right:90px;" >Vídeos</a>
		<a href="web.php" style="margin-right:90px;"		>Web</a>
		<a href="jogos.php" style="margin-right:90px;"  >Jogos</a>
		<a href="blog.php"										>Blog</a>
	</div><!-- Fim do Menu -->

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->
		<div class="pubEsq"><!-- Publicidade Esquerda -->
			Publicidade
		</div><!-- Fim do Publicidade Esquerda -->
		
		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Últimos Vídeos</span>
			<br><br>
			<?php videoYoutube($conexao, 0, 'titulo'); ?>
		</div><!-- Fim do Conteúdo -->
		
		<div class="pubDir"><!-- Publicidade Direita -->
			Publicidade
		</div><!-- Fim do Publicidade Direita -->
	
	</div><!-- Fim do Publicidade e Conteúdo -->


<?php //echo $inicio; ?>


</div>
</body></center>