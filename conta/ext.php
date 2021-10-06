<?php 
require("conexao.php"); 
	$login=$_POST['UserName'];
	$sql=mysql_query("SELECT * FROM movimentos WHERE quem='$login'") or die (mysql_error());
	$row=mysql_num_rows($sql);
	
	$total = 0;
	if ($row != 0){ 
		while($l2=mysql_fetch_array($sql)){
			$dia = substr ($l2['data'], 8, 2);
			$mes = substr ($l2['data'], 5, 2);
			$ano = substr ($l2['data'], 0, 4);
			$data = $dia . "-" . $mes . "-" . $ano;

			if ($l2['forma'] == "ganho") { 
				$texto = $texto . $l2['onde'] ." | + R$ " . $l2['valor'] . " | " . $data . "\n\n" ; 
				$total = $total + $l2['valor'] ;
			 }
			else if ($l2['forma'] == "gasto") { 
				$texto = $texto . $l2['onde'] ." | - R$ " . $l2['valor'] . " | " . $data . "\n\n"; 
				$total = $total - $l2['valor'] ;
			}
		} // End While
		$texto = $texto . "\n" . "Subtotal R$ " . $total;
		die($texto);
	} 
	else die("User without registers");
?>