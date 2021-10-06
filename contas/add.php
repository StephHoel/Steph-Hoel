<?php include("conexao.php"); //include("../per/log.php"); salvaLog($_SESSION['login'].": Adicionando no banco de dados", "contas/add.php");

$onde = $_POST['onde'];
$valor = $_POST['valor'];
$como = $_POST['como'];
$forma = $_POST['forma'];
$quem = $_POST['quem'];

mysql_query("INSERT INTO movimentos (onde, valor, como, forma, quem) VALUES ('$onde', '$valor', '$como', '$forma', '$quem')");

header("Location: gerenciador.php");

?>