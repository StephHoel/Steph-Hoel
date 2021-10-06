<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Novo Post | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="/per/css1.css" rel="stylesheet" type="text/css" />

<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">
<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>

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
			<span style="font-size:48px;text-align:center;">Novo Post</span><br><br>
			<span style="font-size:20px;font-family:bookmanOldStyleLeve;">

			<form id="formNew" action="/per/functions.php?mode=sendPost" method="POST">
				<input type="hidden" name="escritor" value="<?php echo $user; ?>">
				<input type="hidden" name="status" id="status">
				Título: <input type="text" size="30" name="titulo">
				<br></br>
				Post:
				<textarea name="post" class="jqte-test"></textarea>
				Data: <input type="date" size="30" name="data">
				<br><br>
				<center>
					<button id="editando">Não Publicar</button>
					<button id="publicado">Publicar</button>
				</center>
			</form>

			<script>
				$("#editando").click(function () {
					$("#status").val("editando");
					return true;
				});
				$("#publicado").click(function () {
					$("#status").val("publicado");
					return true;
				});
				$('.jqte-test').jqte();
			</script>



			<a onclick="javascript:location.href='adm.php'" style="cursor: pointer;font-size:12px;">Voltar</a>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>