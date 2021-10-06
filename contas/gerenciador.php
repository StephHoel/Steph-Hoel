<?php require("aut.php"); ?>
<?php //include("../per/log.php"); salvaLog($_SESSION['login'].": Visualizando", "contas/index.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gerenciador</title>
</head>

<center><body>

<h1>Bem vinda à página de gerenciamento das finanças</h1>
<br /><br />
<table>

<tr>
<td><center>
<h2>Últimos 5 movimentos:</h2><br />
<?php
require("conexao.php");
$quem=$_SESSION['login'];

$s2=mysql_query("SELECT * FROM movimentos WHERE quem='$quem' ORDER BY id DESC LIMIT 5 ") or die (mysql_error()); $r2=mysql_num_rows($s2);

if ($r2>0){ echo "<table>"; while($l2=mysql_fetch_array($s2)){
echo "<tr><td>". $l2['forma'] .": ". $l2['valor'] ." reais com ". $l2['onde'] ."</td></tr>";

} echo "</table>";}
?>
</center></td><td style="width:30px;"></td>
<td><center><h3>
<a onclick="javascript:window.location.href = 'gasto.php';" style='cursor:pointer;'>Adicionar gastos</a><br /><br />
<a onclick="javascript:window.location.href = 'ganho.php';" style='cursor:pointer;'>Adicionar ganhos</a><br /><br />
<a onclick="javascript:window.location.href = 'extrato.php';" style='cursor:pointer;'>Visualizar extrato</a>
</h3></center></td>
</tr>

</table>

</body></center>
</html>