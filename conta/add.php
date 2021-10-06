<?php include("conexao.php"); //include("../per/log.php"); salvaLog($_SESSION['login'].": Adicionando no banco de dados", "contas/add.php");

$onde = $_POST['onde'];
$valor = $_POST['valor'];
$como = $_POST['como'];
$forma = $_POST['forma'];
$quem = $_POST['quem'];
$data = $_POST['data'];

$mes = substr($data,0,2);
$ano = substr($data,4,4);
$dateF = $ano.'-'.$mes.'-'.substr($data,2,2);

mysql_query("INSERT INTO movimentos (onde, valor, como, forma, quem,mes,ano,data) VALUES ('$onde', '$valor', '$como', '$forma', '$quem','$mes','$ano','$dateF')");



?>