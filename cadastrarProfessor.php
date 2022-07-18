<?php

$conexao = new mysqli("localhost","root","","trabalho");

$nome = $_POST['nomeProfessor'];
$disciplina = $_POST['disciplina'];

$query = "insert into professores (nome, disciplina) values ('$nome', $disciplina)";

$resultado = mysqli_query($conexao, $query);
echo 'Foi inserido';

header("location: index.php"); 
die('Não ignore meu cabeçalho...');
?>