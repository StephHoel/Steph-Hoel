<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recuperar | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "recuperar.php");
		include ("per/functions.php");
		include("uni.php");
		switch ($_GET['w']){
			case "cadastro":
				$mensagem = '<form action="?w=cad" method="post"><table width="150">'.
								'<tr><td width="100">Nome:</td>'.
								'<td width="50"><input type="text" name="nome" /></td></tr>'.
								'<tr><td width="100">Usuário:</td>'.
								'<td width="50"><input type="text" name="user" /></td></tr>'.
								'<tr><td width="100">Senha:</td>'.
								'<td width="50"><input type="password" name="pass" /></td></tr>'.
								'<tr><td width="100">Email:</td>'.
								'<td width="50"><input type="email" name="email" /></td></tr>'.
								'</table><center><input type="submit" value="Entrar" /></center></form>';
				break;
			case "cad":
				$nome  = $_POST['nome'];
				$user  = $_POST['user'];
				$pass  = $_POST['pass'];
				$email = $_POST['email'];

				enviaCadastro($conexao, $nome, $user, $pass, $email);

				$mensagem = 'Cadastro feito com sucesso!<br>Verifique seu email :D';
				break;
			case "senha":
				$mensagem = '<form action="?w=pass" method="post"><table width="150">'.
								'<tr><td width="100">Email:</td>'.
								'<td width="50"><input type="email" name="email" /></td></tr>'.
								'</table><center><input type="submit" value="Entrar" /></center></form>';
				break;
			case "recuperar":
				$email = $_POST['email'];

				recuperar($conexao, $email);

				$mensagem = 'Verifique seu email :D';
				break;
			case "usuario":
				$mensagem = '<form action="?w=recuperar" method="post"><table width="150">'.
								'<tr><td width="100">Email:</td>'.
								'<td width="50"><input type="email" name="email" /></td></tr>'.
								'</table><center><input type="submit" value="Entrar" /></center></form>';
				break;
			case "cadastro1":
				$mensagem = 'Seu email não foi encontrado.<br>Realize seu cadastro<br><br>'.
								'<form action="?w=cad" method="post"><table width="150">'.
								'<tr><td width="100">Nome:</td>'.
								'<td width="50"><input type="text" name="nome" /></td></tr>'.
								'<tr><td width="100">Usuário:</td>'.
								'<td width="50"><input type="text" name="user" /></td></tr>'.
								'<tr><td width="100">Senha:</td>'.
								'<td width="50"><input type="password" name="pass" /></td></tr>'.
								'<tr><td width="100">Email:</td>'.
								'<td width="50"><input type="email" name="email" /></td></tr>'.
								'</table><center><input type="submit" value="Entrar" /></center></form>';
				break;
			default:
				$mensagem = '<script>location.href="/login.php"</script>';
				break;
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
			<span style="font-size:48px;text-align:center;">Recuperação</span>
			<br><br>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">

			<?php
				echo $mensagem;
			?>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>