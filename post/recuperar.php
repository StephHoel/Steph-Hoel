<?php include("trans/log.php");
	switch($_POST['operation']) {
		case "pass": 
			$title = "Recuperar senha";
			$subtitle = "<h2>Recupere sua senha</h2>";
			$formStart = '<form action="trans/recuperando.php" method="post">';
			$table = '<center><table width="600px"><tr>'.
				'<td width="300px">Usu&aacute;rio:</td><td width="300px"><input name="user" type="text" size="50" /></td></tr>'.
				'<tr><td>Email:</td><td><input name="email" type="text" size="50" /></td></tr>'.
				'</table></center>';
			$formEnd = "<input type='hidden' name='mode' value='pass'>".
				'<input type="submit" value="Procurar" /></form>';
			salvaLog($conexao, "Visitante: Recuperando senha", "allBlog/recuperar.php");
		break;
		
		case "user":
			$title = "Recuperar usu&aacute;rio";
			$subtitle = "<h2>Lembre seu nome de usu&aacute;rio</h2>";
			$formStart = '<form action="trans/recuperando.php" method="post">';
			$table = '<center><table width="600px"><tr>'.
				'<tr><td>Email:</td><td><input name="email" type="text" size="50" /></td></tr>'.
				'<td width="300px">Senha:</td><td width="300px"><input name="pass" type="password" size="50" /></td></tr>'.
				'</table></center>';
			$formEnd = "<input type='hidden' name='mode' value='user'>".
				'<input type="submit" value="Procurar" /></form>';
			salvaLog($conexao, "Visitante: Recuperando usuario", "allBlog/recuperar.php");
		break;
		
		case "email":
			$title = "Recuperar usu&aacute;rio";
			$subtitle = "<script>alert('Verifique o email cadastado!');</script>";
			salvaLog($conexao, "Visitante: Recuperacao pedida", "allBlog/recuperar.php");
		break;
		
		default:
			$title="Recuperar";
			salvaLog($conexao, "Visitante: Recuperar", "allBlog/recuperar.php");
		break;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $title; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<center><body>

<div><br /><br />

<?php 
	echo $subtitle, $formStart, $table, $formEnd;
?>

</div>

</body></center></html>