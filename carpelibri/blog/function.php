<?php include("trans/conexao.php");

if ($_GET['mode'] == "newPost"){
	// POST title, post, by
	
	$title=$_POST['title'];
	$post=$_POST['post'];
	$by = $_POST['by'];
	$date = date("Y-m-d");
	
	echo "Entrou<br>";
	
	//INSERT INTO `blog`(`visible`, `id`, `title`, `text`, `date`, `by`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	
	$insert = "INSERT INTO blog (visible, title, post, data, by) VALUES ('y', '$title', '$post', '$date', '$by')";
	$query  = mysqli_query($conexao, "INSERT INTO `blog` (`visible`, `title`, `post`, `data`, `by`) VALUES ('y', '$title', '$post', '$date', '$by')") or die(mysqli_error($conexao));
	
	if($conexao){
		echo "Conexao OK<br>";
		echo "$insert<br>";
	}
	
	if ($query){
		echo "Saindo";
		header("Location: ../");
	} else {
		 echo "Tente de novo<br>";
		 echo $query;
	}
}

function videoYoutube(mysqli $conexa, $id, $obj ){
	//SELECT * FROM  `videosYoutube` ORDER BY  `videosYoutube`.`data` DESC LIMIT 0 , 30
	$sql=mysqli_query($conexa, "SELECT * FROM videosYoutube ORDER BY 'data' DESC LIMIT $id,1") or die (mysqli_error());
	$row=mysqli_num_rows($sql);
	
	if ($row==1){
		while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
			if($obj == "url")  echo $linha['url'];
			else if ($obj == "data") echo $linha['data'];
		}
	}
}

function posts(mysqli $conexa, $id, $obj ){
	//SELECT * FROM  `blog` LIMIT 0 , 30
	$sql=mysqli_query($conexa, "SELECT * FROM `blog` WHERE `visible`='y' ORDER BY `data` DESC LIMIT $id,1") or die (mysqli_error());
	$row=mysqli_num_rows($sql);
	
	if ($row==1){
		while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
			switch($obj) {
				case "title": echo $linha['title']; break;
				case "data": echo $linha['data']; break;
				case "by": echo $linha['by']; break;
				case "imagem": echo $linha['imagem']; break;
				case "alt": echo $linha['alt']; break;
			}
			
		}
	}
}

function imagens(mysqli $conexa, $ver, $lugar){
	//SELECT * FROM  `imagens` LIMIT 0 , 30
	$sql=mysqli_query($conexa, "SELECT * FROM `imagens` WHERE `visible`='y' AND `lugar`='$lugar' ORDER BY RAND() LIMIT 1") or die (mysqli_error());
	$row=mysqli_num_rows($sql);
	
	if ($row==1){
		while($linha=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
			switch ($ver){
				case "nome": echo $linha['nome']; break;
				case "alt":  echo $linha['alt']; break;
			}
		}
	}
}



?>