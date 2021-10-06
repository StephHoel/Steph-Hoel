<?php include ("trans/autentica.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<title>Novo Post</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table>
  <tr>
  <td>
  <center><h1>Novo Post</h1></center>
	<form method="POST" action="function.php?mode=newPost">
		Título: <input type="text" size="50" name="title"/> <br><br>
		<textarea name="post" cols="100" rows="30"></textarea>
		<br><br>
		<input type="hidden" name="by" value="<?php echo $_SESSION['login']; ?>" />
		
		<center><input type="submit" name="send" value="Postar"/></center>
		
	</form>
  </td>
  </tr>
  </table>
</center>

  <!--
    -title (h2, center) br subtitle (h3, left) br "Leia a notícia completa" (link, h4, right) | ok
    -Part for login and possible of page especific for login, it's possible? | in construction
  -->

</body></html>