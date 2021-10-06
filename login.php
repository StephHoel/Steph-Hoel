<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<title>Login | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "login.php");
		include ("per/functions.php");
		include("uni.php");
		if($_POST['make'] == "entrar"){
			$login = $_POST['login']; $senha = $_POST['senha'];
			login($conexao, $login, $senha);
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
			<span style="font-size:48px;text-align:center;">Login</span>
			<br><br>
			<span style="font-size:20px;text-align:center;font-family:bookmanOldStyleRegular;text-transform: none;">

			<center>
			<form action="" method="post">
				<table width="150">
					<tr><td width="100">Usu&aacute;rio:</td><td width="50"><input type="text" name="login" id="user" /></td></tr>
					<tr><td>Senha:</td><td><input type="password" name="senha" id="pass" /></td></tr>
				</table>
				<center><input type="hidden" name="make" value="entrar" />
			   <input type="submit" value="Entrar" /></center>
			</form>
			</center>
			<h6>
				<a onclick="javascript:location.href='/recuperar.php?w=cadastro'">Não é cadastrado ainda?</a>
				 |
				<a onclick="javascript:location.href='/recuperar.php?w=senha'">Esqueceu a senha?</a>
				 |
				<a onclick="javascript:location.href='/recuperar.php?w=usuario'">Esqueceu o usuário?</a>
			</h6>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>