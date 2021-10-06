<?php
$host = "mysql.hostinger.com.br";
$database="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
$dbname="u313230586_portf"; // BASE DE DADOS 
$usuario="u313230586_hoel"; // USUÁRIO DO MYSQL
$dbsenha="portfoliohoel"; // SENHA DO MYSQL

$conexao = mysqli_connect($host, $usuario, $dbsenha, $dbname);
if($conexao){
	if (mysqli_select_db($conexao, $dbname)){

		//Funções por $_GET['mode']
		switch($_GET['mode']){
			//Mensagens
			case "clear":
				$id1 = $_GET['id'];
				//status	enum('recebido', 'visto', 'respondido', 'deletado')
				$insert1 = "UPDATE `mensagens` SET `status`='deletado' WHERE `id`='$id1'";
				mysqli_query($conexao, $insert1) or die(mysqli_error($conexao));
				header("Location: /post/mensagens.php");
				break;
			case "post":
				$nome1 = $_GET['nome'];
				echo '<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">'.
						'<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">'.
						'<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>'.
						'<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>'.
						'<script>$(".jqte-test").jqte();</script>';
				echo '<div class="conteudo_modal">'.
						'<form action="/per/functions.php?mode=\'send\'" method="post">'.
						'<input type="hidden"  name="de" value="'.$nome1.'">'.
						'Para: <select name="para" size="1" id="para">'.
						'<option value=""></option>';

				$sql = mysqli_query($conexao,"SELECT * FROM `login` ORDER BY `user` ASC");
				$row = mysqli_num_rows($sql);

				if($row>0){
					while($linha=mysqli_fetch_array($sql)){
						echo "<option value='".$linha['user']."'>".$linha['user']."</option>";
					}
				}

				echo '</select><br>'.
						'Assunto: <input type="text" size="30" name="assunto"><br>'.
						'Mensagem:<textarea class="jqte-test" name="mensagem"></textarea>'.
						'<center><input type="submit" value="Enviar"> '.
						'<a href="#" title="fechar" rel="modalclose"><input type="button" value="Fechar" /></a></center>'.
						'</form></div>';
				break;
			case "send":
				$de=$_POST['de'];
				$para=$_POST['para'];
				$assunto=$_POST['assunto'];
				$mensagem=$_POST['mensagem'];
				$data3 = date("Y-m-d");

				//Pegando EmailDe
				$s3=mysqli_query($conexao, "SELECT * FROM `login` WHERE `user`='$de'") or die (mysqli_error($conexao));
				$r3=mysqli_num_rows($s3);
				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						$emailDe = $l3['email'];
					}
				}

				//Pegando EmailPara
				$s3=mysqli_query($conexao, "SELECT * FROM `login` WHERE `user`='$para'") or die (mysqli_error($conexao));
				$r3=mysqli_num_rows($s3);
				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						$emailPara = $l3['email'];
					}
				}

				$assunto2 = "Nova mensagem";
				
				$corpo = "
	Olá {$nome},
			
			Você recebeu uma mensagem de {$de}.
			Acesse <a onclick=\"javascript:location.href='shoelbriegel.com/login.php'\">para visualizar a mensagem</a>.
			
		______________________________
			Steph Hoel"; 
			
				$dest = "contato@shoelbriegel.com";
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "From: Steph Hoel <$dest>\r\n";
				mail($emailPara,$assunto2,$corpo,$headers) ;

				mysqli_query($conexao,"INSERT INTO `mensagens` (`de`, `para`, `emailDe`, `assunto`, `mensagem`, `data`, `status`) values ('$de', '$para', '$emailDe', '$assunto', '$mensagem', '$data3', 'recebido')");
				if ($_POST['id'] != ""){
					$id=$_POST['id'];
					mysqli_query($conexao, "UPDATE `mensagens` SET `status`='respondido' WHERE id='$id'");
				}
				header("Location: /post/mensagens.php");
				break;
			case "read":
				echo '<div class="conteudo_modal">';
				$IDR=$_GET['idmsg'];

				$s3=mysqli_query($conexao, "SELECT * FROM `mensagens` WHERE `id`='$IDR' ") or die (mysqli_error($conexao));
				$r3=mysqli_num_rows($s3);

				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						echo nl2br($l3['mensagem']);
						if($l3['status'] != "respondido") {
							mysqli_query($conexao, "UPDATE `mensagens` SET `status`='visto' WHERE id='$IDR'");
						}
					}
				}

				echo '<br><br><center>'.
						'<a onclick="javascript:location.href=\'/post/mensagens.php\'" title="fechar" rel="modalclose"><input type="button" value="Fechar" /></a>'.
						'</center></div>';
				break;
			case "reply":
				echo '<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">'.
						'<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">'.
						'<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>'.
						'<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>'.
						'<script>$(".jqte-test").jqte();</script>';
				echo '<div class="conteudo_modal">'.
						'<form action="/per/functions.php?mode=send" method="post">'.
						'<input type="hidden"  name="de" value="'.$_GET['de'].'">'.
						'<input type="hidden"  name="para" value="'.$_GET['para'].'">'.
						'Assunto: <input type="text" size="30" name="assunto" value="Re: '.$_GET['assunto'].'"><br>'.
						'Mensagem:<textarea class="jqte-test" name="mensagem"></textarea>'.
						'<input type="hidden" name="id" value="'.$_GET['id'].'">'.
						'<center><input type="submit" value="Enviar"> '.
						'<a href="#" title="fechar" rel="modalclose"><input type="button" value="Fechar" /></a></center>'.
						'</form></div>';
				break;
			//Fim Mensagens
			//Posts
			case "clearPost":
				$id1 = $_GET['id'];
				//status	enum('recebido', 'visto', 'respondido', 'deletado')
				$insert1 = "UPDATE `posts` SET `status`='excluido' WHERE `id`='$id1'";
				mysqli_query($conexao, $insert1) or die(mysqli_error($conexao));
				header("Location: /post/admPost.php");
				break;

			case "sendPost": // somente entrando pelo novo post
				$escritor=$_POST['escritor'];
				$titulo=$_POST['titulo'];
				$post=$_POST['post'];
				$data=$_POST['data'];
				$status = $_POST['status'];

				mysqli_query($conexao,"INSERT INTO `posts` (`titulo`, `post`, `escritor`, `data`, `status`) values ('$titulo', '$post', '$escritor', '$data', '$status')");

				header("Location: /post/admPost.php");
				break;
			case "readPost":
				echo '<div class="conteudo_modal">';
				$IDR=$_GET['idPost'];

				$s3=mysqli_query($conexao, "SELECT * FROM `posts` WHERE `id`='$IDR' ") or die (mysqli_error($conexao));
				$r3=mysqli_num_rows($s3);

				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						echo "Título: ".nl2br($l3['titulo']);
						echo "<br><br>Post: ".nl2br($l3['post']);
						$data=$l3['data'];
						$dataCortada = explode("-", $data);
						$data3 = $dataCortada[2]."/".$dataCortada[1]."/".$dataCortada[0];

						echo "<br><br>Publicado: ".nl2br($data3);

					}
				}

				echo '<br><br><center>'.
						'<a href="#" title="fechar" rel="modalclose"><input type="button" value="Fechar" /></a>'.
						'</center></div>';
				break;
			case "editPost":
				$IDR=$_GET['idPost'];

				echo '<script type="text/javascript">function sendForm(status){'.
						'var titulo = document.getElementById("formEdit").titulo.value;'.
						'var post = document.getElementById("formEdit").post.value;'.
						'var id1 = document.getElementById("formEdit").id1.value;'.
						'var data = document.getElementById("formEdit").data.value;'.
						'location.href="/per/functions.php?mode=edit&titulo="+titulo+"&post="+post+'.
						'"&id="+id1+"&data="+data+"&status="+status;'.
						'}</script>';

				$s3=mysqli_query($conexao, "SELECT * FROM `posts` WHERE `id`='$IDR' ") or die (mysqli_error($conexao));
				$r3=mysqli_num_rows($s3);

				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						$titulo = $l3['titulo'];
						$post = $l3['post'];
						$data=$l3['data'];
					}
				}
				echo '<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">'.
						'<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">'.
						'<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>'.
						'<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>'.
						'<script>$(\'.jqte-test\').jqte();</script>';
				echo '<div class="conteudo_modal">'.
						'<form action="" id="formEdit" method="post">'.
						'Título: <input type="text" size="30" name="titulo" value="'.$titulo.'"><br>'.
						'Post: <textarea name="post" class="jqte-test">'.nl2br($post).'</textarea>'.
						'<input type="hidden" name="id1" value="'.$IDR.'">'.
						'<input type="date" name="data" value="'.$data.'">'.
						'<br><br><center><input type="button" onclick="sendForm(this.id)" id="editando" value="Não Publicar"> '.
						'<input type="button" onclick="sendForm(this.id)" id="publicado" value="Publicar"> '.
						'<a href="#" title="fechar" rel="modalclose"><input type="button" value="Fechar" /></a></center>'.
						'</form></div>';
				break;
			case "edit": // somente entrando pelo edit post
				$titulo=$_GET['titulo'];
				$post=$_GET['post'];
				$data=$_GET['data'];
				$status = $_GET['status'];
				$id1 = $_GET['id'];

				$insert1 = "UPDATE `posts` SET `titulo`='$titulo', `post`='$post', `data`='$data', `status`='$status' WHERE `id`='$id1'";
				mysqli_query($conexao, $insert1) or die(mysqli_error($conexao));

				header("Location: /post/admPost.php");
				break;
			//Fim Posts
		}

		//Funções de Pesquisa no Banco de Dados
		function videoYoutube(mysqli $conexa, $inicio, $fim){
			//SELECT * FROM  `videosYoutube` ORDER BY  `videosYoutube`.`data` DESC LIMIT 0 , 30
			$sql=mysqli_query($conexa, "SELECT * FROM `videos` ORDER BY `data` DESC LIMIT {$inicio},{$fim}") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row>0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					echo '<span style="font-size:24px;text-align:center;font-family:bookmanOldStyleRegular;">'.$linha['titulo'].
							'<br><span style="font-size:18px;">';

					if($linha['autor'] == "Steph Hoel") {
						echo '<a href="https://www.youtube.com/user/stephanyetete" target=_blank>';
					} else if($linha['autor'] == "Steph Yui Hoel") {
						echo '<a href="https://www.youtube.com/channel/UC5OH44XOGQPjrkx5uSd6GVw" target=_blank>';
					}

					$dataCortada = explode("-", $linha['data']);
					$data3 = $dataCortada[2]."/".$dataCortada[1]."/".$dataCortada[0];

					echo $linha['autor']."</a> | ". $data3 ."</span></span><br>";
					echo '<iframe width="512" height="288" src="https://www.youtube.com/embed/';
					echo $linha['url'] . '" frameborder="0" allowfullscreen></iframe><br><br>';
				}
			} else if ($row==0) echo '<span style="font-size:24px;text-align:center;font-family:bookmanOldStyleLeve;">Sem vídeos</span>';
		}

		function posts(mysqli $conexa, $limite, $id){
			//SELECT * FROM  `videosYoutube` ORDER BY  `videosYoutube`.`data` DESC LIMIT 0 , 30
			if($id!="") {
				$sql=mysqli_query($conexa, "SELECT * FROM `posts` WHERE `status`='publicado' AND `id`=$id ORDER BY `data` DESC LIMIT $limite") or die (mysqli_error($conexa));
			} else {
				$sql=mysqli_query($conexa, "SELECT * FROM `posts` WHERE `status`='publicado' ORDER BY `data` DESC LIMIT $limite") or die (mysqli_error($conexa));
			}
			$row=mysqli_num_rows($sql);

			if ($row>0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$data=date_create($linha['data']);

					$datetime2 = date_create(date("Y-m-d"));
					$interval = date_diff($data, $datetime2);
					$dataDif = $interval->format('%a');

					if ($dataDif >= 0){
						$dataCortada = explode("-", $linha['data']);
						$data3 = $dataCortada[2]."/".$dataCortada[1]."/".$dataCortada[0];
						echo '<span style="font-size:24px;text-align:center;">'.nl2br($linha['titulo']).'</span><br>'.
								'<span style="font-size:12px;text-align:right;">Publicado por '.nl2br($linha['escritor']).
									' em '.$data3.'</span><br><br>'.
								'<span style="font-size:18px;text-align:justify;">';

								if($id=="") {
									$palavras = explode(" ", nl2br($linha['post']));
									if(count($palavras)>100) {
										for ($i = 0; $i < 100; $i ++){
											echo $palavras[$i]." ";
										}
										echo '...'.
												'<br>'.
												'<div style="font-size:15px;text-align:right;"><a href="?leia='.$linha['id'].
												'" id="leia">Leia mais</a></div></span>';
									} else {
										echo nl2br($linha['post']).'</span>';
									}

								} else echo nl2br($linha['post']).
												'<div style="font-size:15px;text-align:right;"><a href="blog.php">Voltar</a></div>';

									echo '<br><hr><br>';
					}
				}
			} else if ($row==0) echo '<span style="font-size:24px;text-align:center;font-family:bookmanOldStyleRegular;">Em breve mais informações<br><br><br></span>';
		}

		function login(mysqli $conexa, $login, $senha){
			//SELECT * FROM  `login` WHERE  `user` =  'Steph Hoel' AND  `pass` =  'hoel1996' AND  `status` =  'ativo'
			$sql=mysqli_query($conexa, "SELECT * FROM `login` WHERE `user`='$login' and `pass`='$senha' and `status`='ativo'") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row==1){
				session_start();
				$_SESSION['user']=$login;

				echo "<script>alert('Sessão Aberta!');</script>";
				
				enviaSessao($conexa, $login);

				//include("log.php"); salvaLog($_SESSION['login'].": Fazendo login", "per/function.php");


			} else echo "<script>alert('Login não efetuado!');</script>";
			//else echo '<span style="font-size:24px;text-align:center;font-family:bookmanOldStyleLeve;">Login não efetuado! Tente novamente!</span>';
		}

		function verificaSessao(mysqli $conexa, $user){
			verificaInativo($conexa);
			//SELECT * FROM  `session` WHERE  `user` ='$user' AND  `status` ='ativo'
			$sql=mysqli_query($conexa, "SELECT * FROM `session` WHERE `user`='$user' and `status`='ativo'") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row>0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){

					$dataAtual = date("Y-m-d H:i:s");
					$dataExpira = $linha['expira'];

					$datatime1 = new DateTime($dataExpira);
					$datatime2 = new DateTime($dataAtual);

					$data1  = $datatime1->format('Y-m-d H:i:s');
					$data2  = $datatime2->format('Y-m-d H:i:s');

					$diff = $datatime1->diff($datatime2);
					$horas = $diff->h + ($diff->days * 24);

					// if $horas >= 1 hora
					if ($horas >= 1){ // se maior que 1 hora
						// var_dump($date1 > $date2) verifica se date1 maior que date2
						// seta status para desativo
						$id = $linha['id'];
						$insert1 = "UPDATE `session` SET `status`='inativo' WHERE `id`='$id'";
						mysqli_query($conexa, $insert1) or die(mysqli_error($conexa));

						//echo "<script>alert('Sessão Expirada!');</script>";

						include("log.php"); salvaLog($conexao, $linha['user'].": Verificando sessão", "per/function.php");
						header("Location: /login.php");
					} // end if
					else if ($horas < 1){
						$data = date("Y-m-d H:i:s");
						$date = date_create($data);
						date_add($date,date_interval_create_from_date_string("1 hours"));

						$expira = date_format($date,"Y-m-d H:i:s");
						$id = $linha['id'];

						$insert1 = "UPDATE `session` SET `expira`='$expira' WHERE `id`='$id'";
						mysqli_query($conexa, $insert1) or die(mysqli_error($conexa));

						//echo "<script>alert('Sessão Renovada!');</script>";

						//include("log.php"); salvaLog($linha['user'].": Verificando sessão", "per/function.php");

						//echo "<br><br>Sessão renovada com sucesso!<br>User: $user<br>Expira em: $expira<br>Status: ativo";
					} // end else if


				} // end while
			}  // end if $row
			else {
				//echo "<script>alert('Faça o Login!');</script>";

				header("Location: /login.php");
			}
		}

		function verificaInativo(mysqli $conexa){
			$sql=mysqli_query($conexa, "SELECT * FROM `session` WHERE `status`='inativo'") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row>0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$user1 = $linha['user'];
					$expirou = $linha['expira'];
					$id = $linha['id'];

					$insert = "INSERT INTO `sessionInativo` (`user`, `expirou`) VALUES ('$user1', '$expirou')";
					mysqli_query($conexa, $insert) or die(mysqli_error($conexa));

					//DELETE FROM `session` WHERE 1
					$insert1 = "DELETE FROM `session` WHERE `id`='$id'";
					mysqli_query($conexa, $insert1) or die(mysqli_error($conexa));
				}
			}
		}

		// Funções para Enviar Informações para o Banco de Dados
		function enviaVideo(mysqli $conexa, $titulo, $url, $data, $autor){
			$sql=mysqli_query($conexa, "SELECT * FROM `videos` WHERE `url`='$url'") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row==0){
				$insert = "INSERT INTO `videos` (`titulo`, `url`, `data`,`autor`) VALUES ('$titulo', '$url', '$data', '$autor')";
				$query  = mysqli_query($conexa, $insert) or die(mysqli_error($conexa));
				$aviso0 = "Video adicionado";
				return "Video adicionado";
			} else { $aviso0 = "Video ja na lista"; return "Video ja na lista"; }


		}

		function logout(mysqli $conexa, $user){

			$insert1 = "UPDATE `session` SET `status`='inativo' WHERE `user`='$user' AND `status`='ativo'";
			mysqli_query($conexa, $insert1) or die(mysqli_error($conexa));
		}

		function enviaSessao(mysqli $conexa, $user){
			$data = date("Y-m-d H:i:s");
			$date = date_create($data);
			date_add($date,date_interval_create_from_date_string("1 hours"));
			$expira = date_format($date,"Y-m-d H:i:s"); // com + 1 hora

			$sql=mysqli_query($conexa, "SELECT * FROM `session` WHERE `user`='$user' and `status`='ativo'") or die (mysqli_error());
			$row=mysqli_num_rows($sql);

			if ($row>0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$id = $linha['id'];
					$insert1 = "UPDATE `session` SET `status`='inativo' WHERE `id`='$id'";
					mysqli_query($conexa, $insert1) or die(mysqli_error($conexa));
				}
			}

			$insert = "INSERT INTO `session` (`user`, `expira`, `status`) VALUES ('$user', '$expira', 'ativo')";
			$query  = mysqli_query($conexa, $insert) or die(mysqli_error($conexa));

			echo "<script>alert('Sessão Enviada!');</script>";
			
			header("Location: post/adm.php");
		}

		function enviaMensagem(mysqli $conexa, $nome, $email, $assunto, $mensagem){
			$data = date("Y-m-d");
			$insert = "INSERT INTO `mensagens` (`para`, `de`, `emailDe`, `assunto`,`mensagem`, `data`, `status`) VALUES ('Steph Hoel', '$nome', '$email', '$assunto', '$mensagem', '$data', 'recebido')";
			$query  = mysqli_query($conexa, $insert) or die(mysqli_error($conexa));
		}

		function enviaPost(mysqli $conexa, $titulo, $post, $escritor, $status){
			$data = date("Y-m-d");
			$insert = "INSERT INTO `posts` (`titulo`, `post`, `escritor`, `data`, `status`) VALUES ('$titulo', '$post', '$escritor', '$data', '$status')";
			$query  = mysqli_query($conexa, $insert) or die(mysqli_error($conexa));
		}

		function enviaCadastro(mysqli $conexa, $nome, $user, $pass, $email){
			//$data = date("Y-m-d");
			$insert = "INSERT INTO `login` (`nome`, `user`, `pass`, `email`, `status`) VALUES ('$nome', '$user', '$pass', '$email', 'desativo')";
			$query  = mysqli_query($conexa, $insert) or die(mysqli_error($conexa));

			$assunto1 = "Ativação de Conta";
			$corpo =" 
	{$nome},
	
		Ative sua conta o mais breve possível <a onclick=\"javascript:location.href=\'http://shoelbriegel.com/ativacao.php?email=\'$email\'\' \"	target=\"_blank\" style=\"cursor: pointer;\">neste link</a> 
		
	S Hoelbriegel."; 

			$dest = "contato@shoelbriegel.com";
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
			$headers .= "From: Não Responda <$dest>\r\n";
			$headers .= "Reply-To: $dest\r\n";
			mail($email,$assunto1,$corpo,$headers) ; // envia email para usuario

		}

 		// Recuperação
 		function recuperar(mysqli $conexa, $email){
 			$insert = "SELECT `login` WHERE `email`='$email' ";
 			$sql=mysqli_query($conexa, $insert) or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row==1){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					if ($linha['status'] == "ativado") {
						$assunto1 = "Recuperação de User/Senha";
						$corpo =" 
	{$nome},
	
		Conforme pedido, seu Usuário é {$linha['user']} e sua Senha é {$linha['senha']}.
		
	S Hoelbriegel."; 

						$dest = "contato@shoelbriegel.com";
						$headers = "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
						$headers .= "From: Não Responda <$dest>\r\n";
						$headers .= "Reply-To: $dest\r\n";
						mail($email,$assunto1,$corpo,$headers) ; // envia email para usuario
					} else {
						$assunto1 = "Ativação de Conta";
						$corpo =" 
	{$nome},
	
		Ative sua conta o mais breve possível <a onclick=\"javascript:location.href=\'http://shoelbriegel.com/ativacao.php?email=\'$email\'\' \"	target=\"_blank\" style=\"cursor: pointer;\">neste link</a> 
		
	S Hoelbriegel."; 

						$dest = "contato@shoelbriegel.com";
						$headers = "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
						$headers .= "From: Não Responda <$dest>\r\n";
						$headers .= "Reply-To: $dest\r\n";
						mail($email,$assunto1,$corpo,$headers) ; // envia email para usuario
					}
				}
			} else header("Location: /recuperar.php?w=cadastro1");




			

		}
 			 	
	} else{ print "Não foi possível selecionar o Banco de Dados"; }
} else{ print "Erro ao conectar o MySQL"; }

?>