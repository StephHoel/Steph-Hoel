<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mensagens | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="/per/css1.css" rel="stylesheet" type="text/css" />
<?php require("../per/functions.php"); require("../uni.php");
		session_start();
		$user = $_SESSION['user'];
		verificaSessao($conexao, $user);


?>
<script language="javascript">
function cls(id){
	if(confirm("Deseja mesmo apagar esta mensagem?")){ window.location.href='/per/functions.php?mode=clear&id='+id } else {}
}
</script>
<script type="text/javascript" src="http://www.tidbits.com.br/download/_scripts/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="http://www.tidbits.com.br/download/_scripts/modal/jquery-modal-1.0.pack.js"></script>
</head> 

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Mensagens</span>
			<span style="font-size:20px;font-family:bookmanOldStyleLeve;">
			<br><br>

			<a href="/per/functions.php?mode=post&nome=<?php echo urlencode($_SESSION['user']); ?>" class="modal" rel="modal">
				<input type="button" value="Nova Mensagem" />
			</a>

		   <br /><br />

		   
			<?php
				$sq=mysqli_query($conexao, "SELECT * FROM `mensagens` WHERE `para`='$user' AND `status`!='deletado'");
				$ro=mysqli_num_rows($sq);
				
				if ($ro>0){
					echo '<h1>Suas mensagens</h1>'.
							'<br /><br />'.
							'<table width="500px">';
					while($lin=mysqli_fetch_array($sq, MYSQLI_ASSOC)){

						echo "<tr>";

						switch ($lin['status']){
							case "recebido":
								echo "<td width='5%' style='border: solid 1px #BDBDBD'><b>(NÃO LIDO)</b></td>";
								break;
							case "visto":
					    		echo "<td width='5%' style='border: solid 1px #BDBDBD'><b>(LIDO)</b></td>";
					    		break;
							case "respondido":
					    		echo "<td width='5%' style='border: solid 1px #BDBDBD'><b>(RESPONDIDO)</b></td>";
					    		break;
						}

						echo '<td width="60%" style="border: solid 1px #BDBDBD">'.
								"<h4>De: <strong>".$lin['de']."</strong>".
								"<br>Assunto: <strong>".$lin['assunto']."</strong></h4>".
								'</td>'.
					 			'<td width="35%" style="border: solid 1px #BDBDBD">'.
					 			'<a href="/per/functions.php?mode=read&idmsg='.urlencode($lin['id']).'" class="modal" rel="modal" >'.
					 			'<input type="button" value="Ler" /></a>'.
					 			'<a onclick=\'javascript:cls("'.$lin['id'].'")\'><input type="button" value="Excluir" /></a>'.
					 			'<a href="/per/functions.php?mode=reply&de='.urlencode($_SESSION['user']).
					 			'&para='.urlencode($lin['de']).'&assunto='.urlencode($lin['assunto']).
					 			'&id='.urlencode($lin['id']).
					 			'" class="modal" rel="modal" ><input type="button" value="Responder" /></a>';
				 	}

			   echo '</table>';
				} else echo '<h1>Você não tem mensagens</h1><br /><br />';

			?>

			<br><br>

			<a onclick="javascript:location.href='adm.php'" style="cursor: pointer;font-size:12px;">Voltar</a>

			<br><br>

			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>