<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<link href="per/css2.css" type="text/css" rel="stylesheet">
	<title>Cadastrando | Algiz</title>
	<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
	<?php
		include ("per/functions2.php");
		include ("uni.php");
	?>
</head> 

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<br><span class="justRegular" style="font-size:28px;">

			<?php
				$nome 			 = $_POST['nome'];
				$apelido 		 = $_POST['apelido'];
				$email 			 = $_POST['email'];
				$nome_canal 	 = $_POST['nome_canal'];
				$descricao 		 = $_POST['descricao'];
				$link_canal 	 = $_POST['link_canal'];
				$link_page 		 = $_POST['link_page'];
				$link_instagram = $_POST['link_instagram'];
				$link_twitter 	 = $_POST['link_twitter'];

				enviaPerfil($conexao1, $nome, $apelido, $email, $nome_canal, $descricao, $link_canal, $link_page, $link_instagram, $link_twitter);
				//{

				$numPergunta = numPerg($conexao1);
				for($i=1; $i <= $numPergunta; $i++) {
					enviaPergunta ($conexao1, $email, $i, $_POST[$i]);
				}

			?>

			<br><br>

			Aguarde o contato de um administrador para ter uma posição sobre sua ficha.

			<br><br><br><br>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->

</body></center></html>