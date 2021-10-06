<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="per/css1.css" type="text/css" rel="stylesheet">
	<title>Algiz | Steph Hoel</title>
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
	<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "algiz.php");
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
			Grupo Algiz é um grupo para youtubers crescerem juntos e cada vez mais melhorarem a produção de um modo geral.
			<br>
			<!-- Confira alguns dos membros aqui:
			[colocar randomicamente 3 ou 4 membros aceitos com uma foto e a descrição do canal juntamente com o nome]

			Se quiser fazer parte do grupo, é só clicar aqui [link para um formulário de inscrição com as perguntas e mais alguns dados importantes] e preencher a ficha com sinceridade.
			 -->

			<br>
			<span style="font-size:28px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<b>Steph Hoel</b><br>
			</span>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			Canal que mostra de tudo um pouco!<br>
			<a style="color: red;" href="youtube.com/stephhoe" target="_blank">Steph Hoel</a>
			</span>
			<br><br><br>
			<span style="font-size:28px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			<b>Leoney Santos</b><br>
			</span>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
			Um canal literário iniciante muito legal!<br>
			<a style="color: red;" href="youtube.com/trilhandohistorias1" target="_blank">Trilhando Histórias</a>
			</span>
			<br><br><br><br>

			E tem muito mais! Em breve terá mais canais aqui!

			<br><br>


			<br>


			<br>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->

</body></center></html>