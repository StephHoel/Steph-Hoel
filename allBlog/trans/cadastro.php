<?php
	require ("conexao.php"); include("log.php");
	if ($_POST){
		
		$login = $_POST['login'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$sq=mysql_query("SELECT * FROM login WHERE user='".$login."'"); $ro=mysql_num_rows($sq);
		if ($ro==0){
			$con=mysql_query("INSERT INTO login (user, email, pass) VALUES ('$login', '$email', '$senha')"); 
				// cadastrando usuario
				mysql_insert_id();
			if ($con){	
				$destinatario = $email;
				$assunto = "Bem vindo ao Sociace";
				$corpo =" 
	Seja bem vindo ao Sociace
	
	
	Seu cadastro foi realizado com sucesso e estes são os dados informados:
	
	Usuário: $login
	Email: $email
	Senha: $senha
	
	Entre em nosso site com seu nome de usuário e senha e se divirta!
	
		
	Sociace"; 

				$dest = "sociace@shoelbriegel.com";
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
				$headers .= "From: Sociace <$dest>\r\n";
				$headers .= "Reply-To: $dest\r\n";
				mail($destinatario,$assunto,$corpo,$headers) ; // envia email para usuario
				
				$ass = "Novo usuário - Sociace";
				$corp = "
	Novo usuário registrado

	O usuário $login acabou de se registrar.
	
	Sociace"; 
				
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
				$headers .= "From: Sociace <$dest>\r\n";
				$headers .= "Reply-To: $dest\r\n";
				mail($dest,$ass,$corp,$headers); // envia email para ADM
				
				header('Location: ../index.php'); // redirecionar para login
		
				salvaLog("Cadastrando $login no banco de dados", "allBlog/trans/cadastro.php");
			} // end if's
		} // end if
		} // end if
?>