<?php
	$cabecalho = '<div class="cabecalho"><!-- Cabeçalho -->'.
					 '<img src="http://shoelbriegel.com/images/Steph_Hoel_c.png" alt="Avatar Colorido" width="79px" style="margin-right:15px;">'.
					 'Steph Hoel'.
					 '<img src="http://shoelbriegel.com/images/Steph_Hoel_p.png" alt="Avatar Preto e Branco" width="79px" style="margin-left:15px;">'.
					 '</div><!-- Fim do Cabeçalho -->';

	$menu = '<div class="menu"><!-- Menu -->'.
			  '<a href="/" class="menuSelect"			   >Home</a>'.
			  '<a href="/videos.php" class="menuSelect"  >Vídeos</a>'.
			  '<a href="/web.php" class="menuSelect"	   >Web</a>'.
			  '<a href="/jogos.php" class="menuSelect"   >Jogos</a>'.
			  '<a href="/blog.php" class="menuSelect"    >Blog</a>'.
			  '<a href="/textos.php" class="menuSelect"  >Textos</a>'.
			  '<a href="/algiz.php" class="menuSelect"   >Algiz</a>'.
			  '<a href="/sobre.php" class="menuSelect"   >Sobre</a>'.
			  '<a href="/contato.php" class="menuSelect" >Contato</a>'.
			  '</div><!-- Fim do Menu -->';

	$pubEsq = '<div class="pubEsq"><!-- Publicidade Esquerda -->'.
				 '<br>Publicidade<br><br>'.
		  		 '<!-- Anuncio 1 -->'.
		  		 '<ins class="adsbygoogle" style="display:inline-block;width:120px;height:240px"'.
		  		 'data-ad-client="ca-pub-5662201857181025" data-ad-slot="9728792597"></ins>'.
		  		 '<br><br>'.
		  		 '<!-- Anuncio 1 -->'.
		  		 '<ins class="adsbygoogle" style="display:inline-block;width:120px;height:240px"'.
		  		 'data-ad-client="ca-pub-5662201857181025" data-ad-slot="9728792597"></ins>'.
				 '<br><br></div><!-- Fim do Publicidade Esquerda -->';

	$ArrPATH = explode("/",$_SERVER["SCRIPT_NAME"]);
	$PATH = $ArrPATH[count($ArrPATH)-1];
	if ($PATH == "blog.php"){
		$logi = '<br><center><span style="font-size:28px;text-align:center; border: 1px lightgray solid; border-top-left-radius: 20px; border-bottom-right-radius: 20px; background-color: lightgray; text-align: center; padding:10px;"><a href="/login.php">Login</a></span></center><br>';
	}

	$pubDir = '<div class="pubDir"><!-- Publicidade Direita -->'.
				 $logi .
				 '<br>Publicidade<br><br>'.
				 '<!-- Anuncio Clixsense -->'.
		  		 '<a href="http://www.clixsense.com/?8275588" target=_blank>'.
		  		 '<img src="http://csstatic.com/banners/clixsense_gpt120x600a.png" border=0></a>'.
				 '<br><br></div><!-- Fim do Publicidade Direita -->';

	echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>'.
		  '<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';


?>