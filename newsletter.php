<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Newsletter | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "newsletter.php");
		include ("per/functions.php");
		include("uni.php");
	
	$status = $_POST['env'];
		if ($status == "enviado"){
			$nome = $_POST['nome'];
			$email = $_POST['email'];

			$insert = "INSERT INTO `newsletter` (`nome`, `email`, `enviar`) VALUES ('$nome', '$email', 'sim')";
			$query  = mysqli_query($conexao, $insert) or die(mysqli_error($conexao));

			$mensagem = 'Email inserido na lista com sucesso!!!<br>A partir de agora você receberá as novidades por email! :D';
			salvaLog("{$nome}: Email na newsletter", "newsletter.php");
		}
		else{
			$mensagem = '<form action="" method="post" style="text-align:center;" name="envia">'.
						  	'<input name="nome" type="text" size="55" onfocus="if(value==\'Nome\'){value=\'\'}" onfocusout="if(value==\'\'){value=\'Nome\'}" value="Nome" /><br />'.
						  	'<input name="email" type="email" size="55" onfocus="if(value==\'Email\'){value=\'\'}" onfocusout="if(value==\'\'){value=\'Email\'}" value="Email"/><br /><br />'.
							'<input type="hidden" name="env" value="enviado" />'.
							'<center><input type="submit" value="Enviar" /></center>'.
						  '</form>';
		}

?>


</head> 

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Para receber as novidades:</span>
			<br><br>
			<?php //videoYoutube($conexao, 0, 15); ?>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">

				<?php echo $mensagem; ?>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>