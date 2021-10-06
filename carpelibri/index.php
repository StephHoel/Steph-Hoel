<?php include ("blog/function.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link href="blog/style.css" type="text/css" rel="stylesheet">
		<title>Home | Carpe Libri</title>
	</head>
	<body>
		<center>
			
			<?php include ("menu.php"); ?>
			
			<img src="images/home/<?php imagens($conexao, "nome","home"); ?>" alt="<?php imagens($conexao, "nome","home"); ?>" style="position:relative;margin:auto;width:900px;">
		
			
			
			</br></br>
			
			<span class="citacao">
				"Não tenha piedade nos mortos, Harry.</br>
				Tenha piedade dos vivos e, acima de tudo, dos que vivem sem amor."</br>
				- Alvo Dumbledore
			</span>
			
			</br></br>
			
			<div id="divNews">
				<span class="news">ÚLTIMAS PUBLICAÇÕES</span> 
				</br></br>
				<center><table class="divIntNews">
					<tr>
						<td>
							<img src="images/posts/<?php posts($conexao, 0, 'imagem'); ?>" alt="<?php posts($conexao, 0, 'alt'); ?>" >
						</td>
						<td style="width: 200px; text-align:justify;">
							<span class="intNewsTitle"><?php posts($conexao, 0, 'title'); ?></span></br>
							Por <?php posts($conexao, 0, 'by'); ?> <br> em <?php posts($conexao, 0, 'data'); ?> 
						</td>
						<td style="width: 20px;">
						</td>
						<td>
							<img src="images/posts/<?php posts($conexao, 1, 'imagem'); ?>" alt="<?php posts($conexao, 1, 'alt'); ?>">
						</td>
						<td style="width: 200px; text-align:justify;">
							<span class="intNewsTitle"><?php posts($conexao, 1, 'title'); ?></span></br>
							Por <?php posts($conexao, 1, 'by'); ?> <br> em <?php posts($conexao, 1, 'data'); ?> 
						</td>
					</tr>
					<tr><td style="height: 5px;" colspan="5">
					</td></tr>
					<tr>
						<td>
							<img src="images/posts/<?php posts($conexao, 2, 'imagem'); ?>" alt="<?php posts($conexao, 2, 'alt'); ?>">
						</td>
						<td style="width: 200px; text-align:justify;">
							<span class="intNewsTitle"><?php posts($conexao, 2, 'title'); ?></span></br>
							Por <?php posts($conexao, 2, 'by'); ?> <br> em <?php posts($conexao, 2, 'data'); ?> 
						</td>
						<td style="width: 20px;">
						</td>
						<td>
							<img src="images/posts/<?php posts($conexao, 3, 'imagem'); ?>" alt="<?php posts($conexao, 3, 'alt'); ?>">
						</td>
						<td style="width: 200px; text-align:justify;">
							<span class="intNewsTitle"><?php posts($conexao, 3, 'title'); ?></span></br>
							Por <?php posts($conexao, 3, 'by'); ?> <br> em <?php posts($conexao, 3, 'data'); ?> 
						</td>
					</tr>
				</table></center>
						
			
			</div>
		
			</br></br>
			
			<table width="710px" style="border-collapse: collapse; border-spacing: 0;">
				<tr>
					<td width="370px" style="background: #ececec">
						<div style="margin-left:50px;">
						<br><span class="news">Galeria de Eventos</span><br><br>
						
						<img src="images/eventos/<?php imagens($conexao, "nome","galeriaEventos"); ?>" alt="<?php imagens($conexao, "alt","galeriaEventos"); ?>" width="314px">
						<br><br>
						</div>
					</td>
					<td width="80px">
						
					</td>
					<td width="300px" style="background: #ececec" rowspan="3">
						<div style="margin-left:20px;">
						<br><span class="news">Vídeos</span><br><br>
						<iframe style="margin-top:30px" width="250" height="140" src="https://www.youtube.com/embed/<?php videoYoutube($conexao, 0, "url"); ?>" frameborder="0" allowfullscreen></iframe>
						<iframe style="margin-top:30px" width="250" height="140" src="https://www.youtube.com/embed/<?php videoYoutube($conexao, 1, "url"); ?>" frameborder="0" allowfullscreen></iframe>
						<iframe style="margin-top:30px" width="250" height="140" src="https://www.youtube.com/embed/<?php videoYoutube($conexao, 2, "url"); ?>" frameborder="0" allowfullscreen></iframe>
						
						
						</div>
					</td>
				</tr>
				<tr>
					<td height="40px">
					
					</td>
				</tr>
				<tr>
					<td style="background: #ececec">
						<div style="margin-left:50px; margin-right:30px">
						<br><span class="news">Mural de Autógrafos</span><br><br>
						<img src="images/autografos/<?php imagens($conexao, "nome","autografos"); ?>" alt="<?php imagens($conexao, "alt","autografos"); ?>" width="314px">
						<br><br>
						
						</div>
					
					</td>
				</tr>
			
			</table>
			<br><br><br>
			<div style="background:#76c7c0; margin:-20px; width:100%"><center>
			<span style="font-size:10px;">Copyright 2015 Carpe Libri | Develop by Steph Hoel</span>
	</center></div>
		</center>
	</body>
</html>