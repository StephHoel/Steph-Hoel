<?php 	include("aut.php"); // include("../per/log.php"); salvaLog($_SESSION['login'].": Visualizando", "contas/ganho.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ganhos</title>
</head>

<center><body>

<h1>Adicione o ganho!</h1>
<br /><br />
<form action="add.php" method="post" enctype="multipart/form-data" >
<table>

<tr>
<td>Onde ganhou:</td><td><input type="text" name="onde" /></td>
</tr>

<tr>
<td>Valor:</td><td><input type="text" name="valor" /></td>
</tr>

<tr>
<td>De que forma:</td><td><select name="como">
  <option value="dinheiro">Dinheiro</option>
  <option value="conta">Depósito</option>
</select>
</tr>

</table>
<input type="hidden" name="forma" value="ganho" />
<input type="hidden" name="quem" value="<?php echo $_SESSION['login']; ?>" />
<br />

<input type="submit" value="Adicionar" />
</form>


</body></center>
</html>