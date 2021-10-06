<?php //include("../per/log.php"); salvaLog("Visitante: Visualizando", "contas/index.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>

<center><form action="autent.php" method="post" >
<table>
<tr><td>Login:</td><td><input type="text" size="10" name="login"></td></tr>
<tr><td>Senha:</td><td><input type="password" size="10" name="senha"></td></tr>
</table>
<input type="submit" value="Enviar" />
</form></center>

</body>
</html>