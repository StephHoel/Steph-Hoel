<?php include("conexao.php"); ?>

<center>

<h3>
	<a onclick="javascript:location.href='post.php';" style="cursor:pointer;">Postar</a><br><br>
	<a onclick="javascript:location.href='msg.php';" style="cursor:pointer;">
		<?php $s2=mysql_query("SELECT * FROM privateMensage WHERE userRecived='". $_SESSION['login'] ."' ");
				$r2=mysql_num_rows($s2);
				if ($r2>0){ echo "Novas Mensagens"; } else { echo "Mensagem"; } ?>
	</a><br><br> <!--se houver mensagens mudar para "Nova Mensagem"-->
	<a onclick="javascript:location.href='options.php';" style="cursor:pointer;">Opções</a>
</h3>
<br><br>
<h5>
	<a onclick="javascript:location.href='logout.php';" style="cursor:pointer;">Sair</a>
</h5>
</center>