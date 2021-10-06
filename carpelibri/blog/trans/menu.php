<?php include("conexao.php");

echo '<center><h3>';

// colocar seleção para diferenciar o menu para colaboradores e espectadores
// New Post | apenas para colaboradores
// 
	<a onclick="javascript:location.href='post.php';" style="cursor:pointer;">New Post</a><br><br>
	<a onclick="javascript:location.href='msg.php';" style="cursor:pointer;">
		<?php $s2=mysqli_query("SELECT * FROM privateMensage WHERE userRecived='". $_SESSION['login'] ."' ");
				$r2=mysqli_num_rows($s2);
				if ($r2>0){ echo "News Messages"; } else { echo "Message"; } ?>
	</a><br><br> 
	<a onclick="javascript:location.href='options.php';" style="cursor:pointer;">Options</a>
</h3>
<br><br>
<h5>
	<a onclick="javascript:location.href='logout.php';" style="cursor:pointer;">Logout</a>
</h5>
</center>

 ?>