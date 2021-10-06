<?php include("aut.php"); //include("../per/log.php"); salvaLog($_SESSION['login'].": Visualizando extrato", "contas/extrato.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extrato</title>
</head>

<center><body>

<h1>Extrato</h1>
<br /><br /><br />

<?php
require("conexao.php");
$quem=$_SESSION['login'];

$s2=mysql_query("SELECT * FROM movimentos WHERE quem='$quem' ORDER BY id DESC ") or die (mysql_error()); $r2=mysql_num_rows($s2);

if ($r2>0){ echo "<table>"; while($l2=mysql_fetch_array($s2)){
echo "<tr><td>". $l2['forma'] .": ". $l2['valor'] ." reais com ". $l2['onde'] ."</td></tr>";

} echo "</table>";}
?>


</body></center>
</html>