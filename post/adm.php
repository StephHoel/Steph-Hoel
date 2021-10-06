<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADM | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="/per/css1.css" rel="stylesheet" type="text/css" />
<?php require("../per/functions.php"); require("../uni.php");
		session_start();
		$user = $_SESSION['user'];
		verificaSessao($conexao, $user);


?>
</head> 

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">ADM</span>
			<span style="font-size:20px;font-family:bookmanOldStyleLeve;">
			<br><br>

			<a onclick="javascript:location.href='novoPost.php'" style="cursor: pointer;">Novos Posts</a>

			<br><br>

			<a onclick="javascript:location.href='admPost.php'" style="cursor: pointer;">Posts Antigos</a>

			<br><br>

			<a onclick="javascript:location.href='mensagens.php'" style="cursor: pointer;">Mensagens</a>

			<br><br>

			<a onclick="javascript:location.href='email.php'" style="cursor: pointer;">Enviar Email</a>

			<br><br>

			<a onclick="javascript:location.href='logout.php'" style="cursor: pointer;font-size:14px;">Logout</a>

			<br><br>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>