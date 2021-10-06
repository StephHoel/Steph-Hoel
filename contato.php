<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contato | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "contato.php");
		include ("per/functions.php");
		include("uni.php");
	
	$status = $_POST['env'];
		if ($status == "enviado"){
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$assunto = $_POST['assunto'];
			$mensagem = $_POST['mensagem'];

			enviaMensagem($conexao, $nome, $email, $assunto, $mensagem);
			$mensagem = 'Email enviado com sucesso!!!<br>Em breve entrarei em contato.<br><br>Continue navegando! :D';
			salvaLog("$nome: Email enviado", "contato.php");
		}
		else{
			$mensagem = '<form action="" method="post" style="text-align:center;" name="envia">'.
						  	'<input name="nome" type="text" size="55" onfocus="if(value==\'Nome\'){value=\'\'}" onfocusout="if(value==\'\'){value=\'Nome\'}" value="Nome" /><br />'.
						  	'<input name="email" type="email" size="55" onfocus="if(value==\'Email\'){value=\'\'}" onfocusout="if(value==\'\'){value=\'Email\'}" value="Email"/><br />'.
						  	'<input name="assunto" type="text" size="55" onfocus="if(value==\'Assunto\'){value=\'\'}" onfocusout="if(value==\'\'){value=\'Assunto\'}" value="Assunto"/><br /><br />'.
							'Mensagem:<textarea name="mensagem" class="jqte-test" ></textarea>'.
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
			<span style="font-size:48px;text-align:center;">Contato</span>
			<br><br>
			<?php //videoYoutube($conexao, 0, 15); ?>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">

				<?php

					echo $mensagem;
					echo '<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">'.
						'<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">'.
						'<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>'.
						'<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>'.
						'<script>$(".jqte-test").jqte();</script>';

				?>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>