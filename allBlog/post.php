<?php include("trans/log.php"); // call log function
		session_start(login);
		if ($_SESSION) { salvaLog($_SESSION['login'] .": Visualizando", "allBlog/post.php"); include("trans/autentica.php"); }
		else salvaLog("Visitante: Visualizando", "allBlog/post.php");
		require("trans/conexao.php"); // conection with database
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="Steh" >
<meta name="description" content="Sociace">
<meta name="keywords" content="blog, space, social, text">
<head>
<title>Post</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table class="headAll"><!-- Topinho com witdh 950 px height 50 px-->
  <tr>
  <td colspan="2">
  <h1><center><!-- Mudar depois que colocar no link certo -->
  <a onclick="javascript:location.href='shoelbriegel.com/allBlog'" style="cursor: pointer;">
  Sociace
  </a>
  </center></h1>
  </td>
  </tr>
  
  <tr>
  <td class="bodyIndex">
  <!-- <div> -->
  <!-- div width 800 px height auto -->

  <?php // pagina de post
  
  h2 - Novo Post
  Titulo
  SubTitulo
  Post
  hidden - By
  hidden - Date
  Postar? - Yes/No
  
  
  ?>
  <!-- </div> -->
  </td>
  
  <td class="notificationIndex"> <!-- se estiver logado, aparecer um menu, senao aparecer as opcoes abaixo -->
  
  <?php if ($_SESSION['menu'] == "yes"){ 
	include ("trans/menu.php");
  	 }
  	else {
  ?>
  
  <!-- <div> --> 
  <!-- div width 150 px and height auto -->
	
  <center><h2>Login</h2></center>
  <form action="login.php" method="post">
	<table width="150">
	<tr><td width="100">Usu&aacute;rio:</td><td width="50"><input type="text" name="login" id="user" /></td></tr>
	<tr><td>Senha:</td><td><input type="password" name="senha" id="pass" /></td></tr>
	</table>
	<center><input type="hidden" name="make" value="entrar" />
    <input type="submit" value="Entrar" /></center>
  </form>
  <h6><center>
  <table><tr>
  <td>
		<form name="pass" action="recuperar.php" method="POST">
   	 	<input type="hidden" name="operation" value="pass">
      	<a id="Link" onclick="document.pass.submit()">Esqueceu a senha?</a>
		 </form>
	</td>
	<td>
		|
	</td>
	<td>
		<form name="user" action="recuperar.php" method="POST">
   		<input type="hidden" name="operation" value="user">
      	<a id="Link" onclick="document.user.submit()">Esqueceu o usu&aacute;rio?</a>
		</form>
	</td>
		</tr></table>
  </center></h6>

<br>
	<hr>
<br>

  <center><h2>Cadastro</h2></center>
  <form action="trans/cadastro.php" method="post">
	<table width="150">
	<tr><td width="100">Usu&aacute;rio:</td><td width="50"><input type="text" name="login" id="user" /></td></tr>
	<tr><td width="100">Email:</td><td width="50"><input type="text" name="email" id="mail" /></td></tr>
	<tr><td>Senha:</td><td><input type="password" name="senha" id="pass" /></td></tr>
	</table>
	<center><input type="submit" value="Cadastrar"></center>
  </form>
  
  <!-- </div> -->
  	<?php } ?>

  </td>
  </tr>
  </table>
</center>

  <!--
    -title (h2, center) br subtitle (h3, left) br "Leia a not??cia completa" (link, h4, right) | ok
    -Part for login and possible of page especific for login, it's possible? | in construction
  -->

</body></html>