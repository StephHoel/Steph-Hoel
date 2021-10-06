<?php
$host1 = "mysql.hostinger.com.br";
$database1="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
$dbname1= "u313230586_algiz"; // BASE DE DADOS 
$usuario1="u313230586_algiz"; // USUÁRIO DO MYSQL
$dbsenha1="algiz1"; // SENHA DO MYSQL

$conexao1 = mysqli_connect($host1, $usuario1, $dbsenha1, $dbname1);
if($conexao1){
	if (mysqli_select_db($conexao1, $dbname1)){

		//Funções por $_GET['mode']
		switch($_GET['mode']){
			//Mensagens
			case "clear":
				$id1 = $_GET['id'];
				//status	enum('recebido', 'visto', 'respondido', 'deletado')
				$insert1 = "UPDATE `mensagens` SET `status`='deletado' WHERE `id`='$id1'";
				mysqli_query($conexao1, $insert1) or die(mysqli_error($conexao1));
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

				$sql = mysqli_query($conexao1,"SELECT * FROM `login` ORDER BY `user` ASC");
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
				$s3=mysqli_query($conexao1, "SELECT * FROM `login` WHERE `user`='$de'") or die (mysqli_error($conexao1));
				$r3=mysqli_num_rows($s3);
				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						$emailDe = $l3['email'];
					}
				}

				//Pegando EmailPara
				$s3=mysqli_query($conexao1, "SELECT * FROM `login` WHERE `user`='$para'") or die (mysqli_error($conexao1));
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

				mysqli_query($conexao1,"INSERT INTO `mensagens` (`de`, `para`, `emailDe`, `assunto`, `mensagem`, `data`, `status`) values ('$de', '$para', '$emailDe', '$assunto', '$mensagem', '$data3', 'recebido')");
				if ($_POST['id'] != ""){
					$id=$_POST['id'];
					mysqli_query($conexao1, "UPDATE `mensagens` SET `status`='respondido' WHERE id='$id'");
				}
				header("Location: /post/mensagens.php");
				break;
			case "read":
				echo '<div class="conteudo_modal">';
				$IDR=$_GET['idmsg'];

				$s3=mysqli_query($conexao1, "SELECT * FROM `mensagens` WHERE `id`='$IDR' ") or die (mysqli_error($conexao1));
				$r3=mysqli_num_rows($s3);

				if ($r3>0){
					while($l3=mysqli_fetch_array($s3)){
						echo nl2br($l3['mensagem']);
						if($l3['status'] != "respondido") {
							mysqli_query($conexao1, "UPDATE `mensagens` SET `status`='visto' WHERE id='$IDR'");
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
				mysqli_query($conexao1, $insert1) or die(mysqli_error($conexao1));
				header("Location: /post/admPost.php");
				break;

			case "sendPost": // somente entrando pelo novo post
				$escritor=$_POST['escritor'];
				$titulo=$_POST['titulo'];
				$post=$_POST['post'];
				$data=$_POST['data'];
				$status = $_POST['status'];

				mysqli_query($conexao1,"INSERT INTO `posts` (`titulo`, `post`, `escritor`, `data`, `status`) values ('$titulo', '$post', '$escritor', '$data', '$status')");

				header("Location: /post/admPost.php");
				break;
			case "readPost":
				echo '<div class="conteudo_modal">';
				$IDR=$_GET['idPost'];

				$s3=mysqli_query($conexao1, "SELECT * FROM `posts` WHERE `id`='$IDR' ") or die (mysqli_error($conexao1));
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

				$s3=mysqli_query($conexao1, "SELECT * FROM `posts` WHERE `id`='$IDR' ") or die (mysqli_error($conexao1));
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
				mysqli_query($conexao1, $insert1) or die(mysqli_error($conexao1));

				header("Location: /post/admPost.php");
				break;
			//Fim Posts
		}

		//Funções de Pesquisa no Banco de Dados
		function video_publicidade(mysqli $conexa){ //fazer ainda
			//SELECT * FROM  `videosYoutube` ORDER BY  `videosYoutube`.`data` DESC LIMIT 0 , 30
			$sql=mysqli_query($conexa, "SELECT * FROM `videos` ORDER BY `data_video` DESC LIMIT {$inicio},{$fim}") or die (mysqli_error($conexa));
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

		function membros_publicidade(mysqli $conexa){ //ok
			$sql=mysqli_query($conexa, "SELECT * FROM `perfil` WHERE `status`='adm' OR `status`='membro'") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row>3){ //maior que 3 linhas
				$randoAnt[0] = 0; $randoAnt[1] = 0;
				for($i=0; $i < 3; $i++){ // contando até 3
					if ($i > 0){
						$randoAnt[$i-1] = $rando;
					}
					$rando = rand(1, $row); //randomiza um número entre 1 e a quantidade de linhas
					$linha=mysqli_fetch_array($sql, MYSQLI_BOTH); //pegando os conteúdos
					if ($randoAnt[0] != $rando && $randoAnt[1] != $rando){
						// nome com link br descrição do canal
						echo '<a href="'.$linha['link_canal'].'" target="_blank" style="font-size:28px;text-align:center;">'.
								nl2br($linha['nome_canal']).'</a><br><span style="font-size:20px;text-align:center;">'.
								$linha['descricao_canal'].'</span><hr>';
					} else { $i--; }
				}
			} else if ($row <= 3 && $row > 0){ //entre 1 e 2 linhas
				while($linha=mysqli_fetch_array($sql, MYSQLI_BOTH)){
					// nome com link br descrição do canal
					echo '<a href="'.$linha['link_canal'].'" target="_blank" style="font-size:28px;text-align:center;">'.
							nl2br($linha['nome_canal']).'</a><br><span style="font-size:20px;text-align:center;">'.
							$linha['descricao_canal'].'</span><hr>';
				}
			} else if ($row==0){ //nenhuma linha
				echo '<span style="font-size:28px;text-align:center;font-family:bookmanOldStyleRegular;">Em breve informações dos membros<br><br><br></span>';
			}
		}

		function membros(mysqli $conexa){ //ok
			$sql=mysqli_query($conexa, "SELECT * FROM `perfil` WHERE `status`='adm' OR `status`='membro' ORDER BY `nome_canal` ASC") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row > 0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){ //pegando os conteúdos
					// nome com link br descrição do canal
					echo '<a href="'.$linha['link_canal'].'" target="_blank" style="font-size:28px;text-align:center;">'.
							nl2br($linha['nome_canal']).'</a><br><span style="font-size:20px;text-align:center;">'.
							$linha['descricao_canal'].'</span><br><br>';
				}
			} else if ($row==0){ //nenhuma linha
				echo '<span style="font-size:28px;text-align:center;font-family:bookmanOldStyleRegular;">Em breve informações dos membros<br><br><br></span>';
			}
		}

		function perguntas(mysqli $conexa) { //ok
			$sql=mysqli_query($conexa, "SELECT * FROM `perguntas`") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			if ($row>0){
				echo '<center><table style="font-size:22px;" width="540px" class="centerRegular">';
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
				echo '<tr><td width="265px" style="text-align: right;">'.$linha['pergunta'].'</td>'.
						'<td width="265px" style="text-align: left;">'.
						'<input type="hidden" name="id_pergunta" value="'.$linha['id_pergunta'].'">'.
						'<textarea rows="10" cols="30" name="'.$linha['id_pergunta'].'"></textarea></td></tr>';
				}
				echo '</table></center>';
			}

		}

		function numPerg(mysqli $conexa) { //ok
			$sql=mysqli_query($conexa, "SELECT * FROM `perguntas`") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);

			return $row;

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

						include("log.php"); salvaLog($conexao1, $linha['user'].": Verificando sessão", "per/function.php");
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

		function enviaPerfil(mysqli $conexa, $nome, $apelido, $email, $nome_canal, $descricao, $link_canal, $link_page, $link_instagram, $link_twitter){ //ok
			$data = date("Y-m-d");
			$insert = "INSERT INTO `perfil` (`nome`, `apelido`, `email`, `status`, `nome_canal`, `descricao_canal`, `link_canal`, `link_page`, `link_instagram`, `link_twitter`, `membro_desde`, `whatsapp`, `senha`) VALUES ('$nome', '$apelido', '$email', 'cand', '$nome_canal', '$descricao', '$link_canal', '$link_page', '$link_instagram', '$link_twitter', '$data', '0', '0')";
			$query  = mysqli_query($conexa, $insert) or die(mysqli_error($conexa));
		}

		function enviaPergunta(mysqli $conexa, $email, $id_pergunta, $resposta) { //ok pergunta a pergunta
			$sql=mysqli_query($conexa, "SELECT * FROM `perfil` WHERE `email`='$email'") or die (mysqli_error($conexa));
			$row=mysqli_num_rows($sql);
			if($row == 1) {
				$linha = mysqli_fetch_array($sql, MYSQLI_BOTH); //pegando o conteúdo
			}
			$id_membro = $linha['id_membro'];
			$insert = "INSERT INTO `respostas` (`id_pergunta`, `id_membro`, `resposta`) VALUES ('$id_pergunta', '$id_membro', '$resposta')";
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