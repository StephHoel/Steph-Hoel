<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meus Posts | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="/per/css1.css" rel="stylesheet" type="text/css" />
<?php require("../per/functions.php"); require("../uni.php");
		session_start();
		$user = $_SESSION['user'];
		verificaSessao($conexao, $user);


?>
<script language="javascript">
function cls(id){
	if(confirm("Deseja mesmo apagar este post?")){ window.location.href='/per/functions.php?mode=clearPost&id='+id } else {}
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
			<span style="font-size:48px;text-align:center;">Meus Posts</span>
			<span style="font-size:20px;font-family:bookmanOldStyleLeve;">
			<br><br>

			<?php

				

				$sq=mysqli_query($conexao, "SELECT * FROM `posts` WHERE `escritor`='$user' AND `status`!='excluido'");
				$ro=mysqli_num_rows($sq);
				
				if ($ro>0){
					echo '<table width="500px">'.
							'<tr><td class="post">Status</td>'.
							'<td class="post">Título</td>'.
							'<td class="post">Opções</td></tr>';
					while($lin=mysqli_fetch_array($sq, MYSQLI_ASSOC)){

						echo "<tr>";

						switch ($lin['status']){
							case "editando":
								echo "<td width='10%' class='post'>NÃO PUBLICADO</td>";
								break;
							case "publicado":
								echo "<td width='10%' class='post'>PUBLICADO</td>";
								break;
							default:
								echo "<td width='10%' class='post'></td>";
								break;
						}

						echo "<td width='50%' class='post'>";

						$palavras = explode(" ", $lin['titulo']);
						if(count($palavras)>7) {
							for ($i = 0; $i < 5; $i ++){
								echo $palavras[$i]." ";
							}
							echo "...";
						} else {
							echo $lin['titulo'];
						}
						echo "</td>".
								'<td width="40%" class="post">'.
								'<a href="/per/functions.php?mode=readPost&idPost='.urlencode($lin['id']).'" class="modal" rel="modal" >'.
								'<input type="button" value="Ler" /></a>'.
								'<a onclick=\'javascript:cls("'.$lin['id'].'")\'><input type="button" value="Excluir" /></a>'.
								'<a href="/per/functions.php?mode=editPost&idPost='.urlencode($lin['id']).
								'" class="modal" rel="modal" ><input type="button" value="Editar" /></a>'.
								'</td></tr>';
					}

			   echo '</table>';
				} else echo '<h1>Você ainda não tem posts</h1><br /><br />';

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