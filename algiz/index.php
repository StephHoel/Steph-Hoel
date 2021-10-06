<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="per/css2.css" type="text/css" rel="stylesheet">
	<title>Home | Algiz</title>
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
	<?php
		include ("per/functions2.php");
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

			<span style="font-size:28px;" class="justRegular">
			O Grupo Algiz é focado no crescimento dos youtubers parceiros tanto pessoalmente quanto no Youtube.
			<br><br>
			Alguns de nossos membros:
			<br><br>

			<?php membros_publicidade($conexao1); ?>

			<br><hr>

			<a href="/ficha.php">
			Para fazer parte do grupo é só preencher a ficha com sinceridade aqui
			e em breve um administrador entra em contato contigo!
			</a>

			<br><br>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->

</body></center></html>