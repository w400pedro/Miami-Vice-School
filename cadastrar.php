<?php

$conexao = new mysqli("localhost","root","","trabalho");

$matricula = '';
$nome = $_POST['nome'];
$email = $_POST['email'];

for($c = 0; $c < 10; $c++) {
  $matricula .= rand(0, 9);
}


$query = "insert into alunos (nome, email, matricula) values ('$nome', '$email', '$matricula')";

$resultado = mysqli_query($conexao, $query);
echo 'Foi inserido';

header("location: index.php"); 
die('Não ignore meu cabeçalho...');
?>