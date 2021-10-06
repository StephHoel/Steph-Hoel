<?php include("log.php"); require ("conexao.php");

		switch($_POST['mode']) {
			case "pass":
				$user=$_POST['user'];
				$email=$_POST['email'];
				
				$sql=mysqli_query("SELECT * FROM login WHERE usuario='$user' and email='$email'") or die (mysqli_error());
				$row=mysqli_num_rows($sql);
				if ($row>0){ while($linha=mysqli_fetch_array($sql)){ // recebendo o valor das linhas
				if (((string)($linha['usuario']) == (string)($user)) 
				and ((string)($linha['email']) == (string)($email))){ // valores iguais
				
				$senha=$linha['senha'];
				
				$destinatario = $email;
				$assunto = "Recuperando senha";
				$corpo =
"	Ol&aacute; $user,

	Recebemos uma solicita&ccedil;&atilde;o de recupera&ccedil;&atilde;o de senha do email $email.
	
	Usu&aacute;rio: $user
	Senha: $senha
	
	Se houve solicita&ccedil;&atilde;o, pedimos que ignore este email.

	Sociace"; 
				$dest = "sociace@shoelbriegel.com";
				$headers = "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=iso-8859-1\r\n".
				"From: Social Space <$dest>\r\nReply-To: $dest\r\n";
				mail($destinatario,$assunto,$corpo,$headers) ; // envia email para usuário
				salvaLog("Visitante: Email enviado de recuperacao de senha", "allBlog/trans/recuperando.php");
				}   // end if valores iguais
				} } // end while & if
				
		echo '<form name="pass" action="recuperar.php" method="POST">' .
   			'<input type="hidden" name="operation" value="email">' .
      		'</form><script>document.user.submit()</script>';
			break;
			
			case "user":
				$email=$_POST['email'];
				$senha=$_POST['senha'];
				
				$sql=mysqli_query("SELECT * FROM login WHERE senha='$senha' and email='$email'") or die (mysqli_error());
				$row=mysqli_num_rows($sql);
				if ($row>0){ while($linha=mysqli_fetch_array($sql)){ // recebendo o valor das linhas
				if (((string)($linha['senha']) == (string)($senha)) 
				and ((string)($linha['email']) == (string)($email))){ // valores iguais
				
				$usuario=$linha['usuario'];
				
				$destinatario = $email;
				$assunto = "Recuperando usu&aacute;rio";
				$corpo =
"	Ol$aacute; $usuario,

	Recebemos uma solicita&ccedil;&atilde;o de recupera&ccedil;&atilde;o de usu&aacute;rio do email $email.
	
	Usu&aacute;rio: $usuario
	Senha: $senha
	
	Se houve solicita&ccedil;&atilde;o, pedimos que ignore este email.

	Sociace"; 
				$dest = "sociace@shoelbriegel.com";
				$headers = "MIME-Version: 1.0\r\nContent-Type: text/plain; charset=iso-8859-1\r\n".
				"From: Social Space <$dest>\r\nReply-To: $dest\r\n";
				mail($destinatario,$assunto,$corpo,$headers) ; // envia email para usuário
				salvaLog("Visitante: Email enviado de recuperacao de usuario", "allBlog/trans/recuperando.php");
				} // end if
				}} // end while & if
				
				echo '<form name="pass" action="recuperar.php" method="POST">' .
   			'<input type="hidden" name="operation" value="email">' .
      		'</form><script>document.user.submit()</script>';
			break;
		}
?>