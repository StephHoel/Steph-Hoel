<?php
	require ("conexao.php"); include("log.php");
	if ($_POST){
		
		$login = $_POST['login'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$sq=mysqli_query($conexao, "SELECT * FROM login WHERE user='".$login."'"); $ro=mysqli_num_rows($sq);
		if ($ro==0){
			$con=mysqli_query("INSERT INTO login (user, email, pass) VALUES ('$login', '$email', '$senha')"); 
				// cadastrando usuario
				mysqli_insert_id();
			if ($con){	
				$destinatario = $email;
				$assunto = "Bem vindo ao Carpe Libri";
				$corpo =" 
	Seja bem vindo ao Carpe Libri

	
	Seu cadastro foi realizado com sucesso e estes são os dados informados:
	
	Usuário: $login
	Email: $email
	Senha: $senha
	
	Acesse o site com seu nome de usuário e senha!
	
		
	Carpe Libri"; 

				$dest = "";
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
				$headers .= "From: Carpe Libri <$dest>\r\n";
				$headers .= "Reply-To: $dest\r\n";
				mail($destinatario,$assunto,$corpo,$headers) ; // envia email para usuario
				
				header('Location: ../login.php');
				
			} // end if $con
		} // end if $row
		else {
			// mensagem de "usuario já cadastrado" e form de login igual ao login.php
			
		}
	} // end if $_post
?>