<?php
$host = "mysql.hostinger.com.br";
$database="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
$dbname="u313230586_log"; // BASE DE DADOS 
$usuario="u313230586_admin"; // USUÁRIO DO MYSQL
$dbsenha="hoelbriegel96"; // SENHA DO MYSQL

$conexao = mysqli_connect($host, $usuario, $dbsenha, $dbname);
if($conexao){
	if (mysqli_select_db($conexao, $dbname)){
		/** Função para salvar mensagens de LOG no MySQL
		  * @param string $mensagem - A mensagem a ser salva
		  * @return bool - Se a mensagem foi salva ou não (true/false)
		 */

		function salvaLog(mysqli $conex, $mensagem, $url) {
			$ip = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
			$hora = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
 			
 			// Usamos o mysql_escape_string() para poder inserir a mensagem no banco
 			//   sem ter problemas com aspas e outros caracteres
 			$mensagem = mysql_escape_string($mensagem);
 			$url = mysql_escape_string($url);
 			 
 			 // Monta a query para inserir o log no sistema
 			 $sql = "INSERT INTO `logs` VALUES (NULL, '".$hora."', '".$ip."', '".$url."', '".$mensagem."')";
 			 
 			 if (mysqli_query($conex, $sql)) {
 			 	return true;
 			 	} else {
 			 		return false;
 			 		}
 			 }
 			 	
 			 	} else{ print "Não foi possível selecionar o Banco de Dados"; }
 		} else{ print "Erro ao conectar o MySQL"; }
?>