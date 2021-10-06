<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Novo Post | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="/per/css1.css" rel="stylesheet" type="text/css" />
<?php require("../per/functions.php"); require("../uni.php"); 
		session_start();
		$user = $_SESSION['user'];
		verificaSessao($conexao, $user);
		
		
?>
</head> 

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->
		
		<?php echo $pubEsq; ?>
		
		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Novo Post</span>
			<span style="font-size:20px;font-family:bookmanOldStyleLeve;">
			<br><br>
			
			Colocar aqui o formulário para novas postagens
			
			<!--
				Titulo - input text
				Post - textarea
				Escritor - hidder $_SESSION['user']
				Data - Quando publicar? {colocar um mini calendário para definir uma data}
				Status - radio('Publicar','Editando')
				
			-->
			
			<br><br>
			
			<a onclick="javascript:location.href='adm.php'" style="cursor: pointer;font-size:12px;">Voltar</a>
			
			<br><br>
			
			</span>
		</div><!-- Fim do Conteúdo -->
		
		<?php echo $pubDir; ?>
	
	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>