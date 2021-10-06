<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Novo Post | Steph Hoel</title>
<script type="text/javascript" src="http://ajax.googlesapi.com/ajax/libs/jquery/jquery.min.js"></script>
<link href="/per/css1.css" rel="stylesheet" type="text/css" />

<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/demo.css">
<link type="text/css" rel="stylesheet" href="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="http://shoelbriegel.com/jQuery/jquery-te-1.4.0.min.js" charset="utf-8"></script>

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
			<span style="font-size:48px;text-align:center;">Enviar Email</span><br><br>
			<span style="font-size:20px;font-family:bookmanOldStyleLeve;">

			<?php

			$sql=mysqli_query($conexao, "SELECT * FROM `email` limit 4001,1000") or die (mysqli_error($conexao));
			$row=mysqli_num_rows($sql);

			if ($row>0){
				while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
					$email = $linha['email'];

					$assunto1 = "Youtube";
					$corpo =" 
	Olá você que está lendo este email,

Venho por meio deste apresentar-lhe meu canal no Youtube onde falo de várias coisas, como videobook, lendas e cultura brasileira, gameplays variadas, entre outras coisas.
Não perca a oportunidade de visitar e avaliar este novo canal que com a sua ajuda poderá crescer cada vez mais e com o conteúdo que você deseja ver!
Me diga o conteúdo que deseja ver no youtube que eu faço o possível para trazê-lo.
Me faça perguntas que eu as respondo em vídeo!

Se desejar, pode responder este email que ficarei feliz em lê-lo e respondê-lo.
Eis meu canal
Steph Hoel: <a href=\"http://shoelbriegel.com/youtube\" target=\"_blank\">shoelbriegel.com/youtube</a>
Steph Yui Hoel: <a href=\"http://shoelbriegel.com/youtubeYui\" target=\"_blank\">shoelbriegel.com/youtubeYui</a>

	Atenciosamente,
	Stephanye Hoelbriegel.

	Site: <a href=\"http://shoelbriegel.com\" target=\"_blank\">shoelbriegel.com</a>
	Steph Hoel: <a href=\"http://shoelbriegel.com/youtube\" target=\"_blank\">shoelbriegel.com/youtube</a>
	Steph Yui Hoel: <a href=\"http://shoelbriegel.com/youtubeYui\" target=\"_blank\">shoelbriegel.com/youtubeYui</a>
	
		"; 

					$dest = "contato@shoelbriegel.com";

					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					//$headers .= 'From: $nome <$email>';

					//$headers = "MIME-Version: 1.0\r\n";
					//$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
					$headers .= "From: Steph Hoel <$dest>\r\n";
					$headers .= "Reply-To: <$dest>\r\n";
					mail($email,$assunto1,$corpo,$headers) ; // envia email para usuario

				}} else echo "Vazio<br>";

				echo "Emails enviados";

?>

			<br><br>

			<a onclick="javascript:location.href='adm.php'" style="cursor: pointer;font-size:12px;">Voltar</a>
			</span>
		</div><!-- Fim do Conteúdo -->

		<?php echo $pubDir; ?>

	</div><!-- Fim do Publicidade e Conteúdo -->

</div><!-- Fim do Corpo -->
</body></center></html>