<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sobre | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="per/css1.css" rel="stylesheet" type="text/css" />
<?php
		include("per/log.php");
			salvaLog($conexao, "Visitante: Visualizando", "sobre.php");
		include ("per/functions.php");
		include("uni.php");
	?>
</head>

<center><body>

<div class="corpo"> <!-- Corpo -->
	<?php echo $cabecalho; ?>

	<?php echo $menu; ?>

	<div class="pubEcont"><!-- Publicidade e Conteúdo -->

		<?php echo $pubEsq; ?>

		<div class="conteudo"><!-- Conteúdo -->
			<span style="font-size:48px;text-align:center;">Sobre Steph Hoel</span>
			<br><br>
			<?php //videoYoutube($conexao, 0, 15); ?>
			<span style="font-size:20px;text-align:justify;font-family:bookmanOldStyleRegular;text-transform: none;">
				Nascida e criada no Rio de Janeiro, onde ainda mora, Steph Hoel tem 19 anos, é <strong>Técnica em Programação de Jogos Digitais</strong>
				pelo <strong>SENAI</strong> e é graduanda em <strong>Sistemas para Internet</strong> pela <strong>Universidade Estácio de Sá</strong>.
				Curiosa por natureza, muita coisa de sua paixão (programação web) foi aprendida através de pesquisas na internet.
				Mexe em computadores desde seus 5 anos de idade e atualmente possui alguns conhecimentos autodidatas.
				<br><br>
				Alguns conhecimentos:
				<ul>
					<li>Editores de <strong>texto</strong>, <strong>planilha</strong>, <strong>apresentação</strong>, <strong>foto (Photoshop e Gimp)</strong>;</li>
					<li>SGBD <strong>MySQL</strong>;</li>
					<li>Sistema Operacional <strong>Windows</strong>, <strong>Linux</strong>, <strong>Mac</strong>;</li>
					<li>Linguagens de Programação: <strong>C# (direcionada à jogos)</strong>, <strong>Java</strong>, <strong>JavaScript</strong>, <strong>C++</strong>;</li>
					<li>Programação Web: <strong>HMTL</strong>, <strong>CSS</strong>, <strong>PHP</strong>, <strong>SQL</strong>;</li>
					<li>Idioma: <strong>Inglês</strong>;</li>
				</ul>

				Alguns cursos:
				<ul>
					<li<strong>Técnico em Programação de Jogos Digitais</strong> em <strong>SENAI/RJ</strong> - 2015;</li>
					<li><strong>Computação Gráfica</strong> em <strong>Seven Computação Gráfica</strong> - 2014;</li>
				</ul>
				<br><br>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>