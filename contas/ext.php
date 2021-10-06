<?php
require("conexao.php");

$s2=mysql_query("SELECT * FROM movimentos ORDER BY id ASC ") or die (mysql_error());
$r2=mysql_num_rows($s2);

if ($r2>0){ 
	echo "Entrando no if r2 ".$r2;
	while($l2=mysql_fetch_array($s2)){
		//echo "Entrando no while l2 ".$l2;
		if ($l2['como'] == "dinheiro"){
			UPDATE 'movimentos' SET como="especie" WHERE id="$l2['id']";
		}
		else if ($l2['como'] == "conta"){
			UPDATE movimentos SET como="corrente" WHERE id="$l2['id']";
		}
		if ($l2['forma'] == "ganho"){
			UPDATE movimentos SET forma="recebido" WHERE id="$l2['id']";
		}
		else if ($l2['forma'] == "gasto"){
			UPDATE movimentos SET forma="pago" WHERE id="$l2['id']";
		}
		UPDATE movimentos SET mes="substr($l2['date'],5,2)", ano="substr($l2['date'],0,4)" WHERE id="$l2['id']";
		echo "Linha ".$l2['id']." alterada<br>";
	}
}
?>