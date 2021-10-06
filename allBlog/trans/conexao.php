<?php
   
$database="localhost:3307"; // SERVIDOR E PORTA UTILIZADA   
$dbname="u313230586_blog"; // BASE DE DADOS 
$usuario="u313230586_adm"; // USUÁRIO DO MYSQL
$dbsenha="hoelbriegel96"; // SENHA DO MYSQL

$conexao=mysql_connect ($database, $usuario, $dbsenha);
if($conexao){
      if (mysql_select_db($dbname, $conexao)){ print "";
      }else{ print "Não foi possível selecionar o Banco de Dados"; }
}else{ print "Erro ao conectar o MySQL"; }
?>