<?php // include("trans/log.php"); // call log function
		// session_start(login);
		// if ($_SESSION) { salvaLog($_SESSION['login'] .": Visualizando", "allBlog/main.php"); include("trans/autentica.php"); }
		// else { salvaLog("Visitante: Visualizando", "allBlog/main.php");
		
		require("trans/conexao.php"); /*conection with database*/ 
		
		//}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<title>Home</title>
</head>

<body>
<center>
<table width=100%>
    
  <tr>
  <td>
  
  <?php
  
  echo '<table">';

  if ($_GET['n']){ // quando estiver chamando um post 
	$id=$_GET['n'];
	$s2=mysqli_query($conexao, "SELECT * FROM blog WHERE id='$id' ") or die (mysqli_error()); $r2=mysqli_num_rows($s2);
	if ($r2>0){ while($l2=mysqli_fetch_array($s2)){
  		echo '<tr><td align="center"><h2>' . $l2['title'] . '</h2></td></tr>' .
		'<tr><td align="justify"><h3>' . $l2['subtitle'] . '</h3></td></tr>'.
		'<tr><td align="right"><h6>Por ' . $l2['by'] . ' em ' . $l2['date'] .'</h6></td></tr>'.
		'<tr><td>' . $l2['text'] . '</td></tr>' .
		'<tr><td align="right"><h6>'.
		'<a onclick="javascript:location.href =\'main.php\';" style="cursor:pointer;">'.
		'Voltar</a></h6></td></tr>';
  }}
} else { // quando nao chamar nada
  		
  $s2=mysqli_query($conexao, "SELECT * FROM blog WHERE visible='y' ORDER BY date DESC LIMIT 15 ") or die (mysqli_error());
  $r2=mysqli_num_rows($s2);
  if ($r2>0){ while($l2=mysqli_fetch_array($s2)){

	echo '<tr><td align="center"><h2>' . $l2['title'] . '</h2></td></tr>' .
		'<tr><td align="justify"><h3>' . $l2['subtitle'] . '</h3></td></tr>'.
		'<tr><td align="right"><h6>Por ' . $l2['by'] . ' em ' . $l2['date'] .'</h6></td></tr>'.
		'<tr><td><br></td></tr>' .
		'<tr><td align="right"><h4>'.
		'<a onclick="javascript:location.href =\'?n=' . $l2['id'] . '\';" style="cursor:pointer;">'.
		'Leia a not&iacute;cia completa</a></h4></td></tr>';

	//	$l2['id']; $l2['text'];
	
  }}}
  
  echo '</table>';
  ?>
 
  </td>
  
  
  </tr>
  </table>
</center>

  <!--
    -title (h2, center) br subtitle (h3, left) br "Leia a notícia completa" (link, h4, right) | ok
    -Part for login and possible of page especific for login, it's possible? | in construction
  -->

</body></html>