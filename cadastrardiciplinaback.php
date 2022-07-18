<?php

$conexao = new mysqli("localhost","root","","trabalho");

$nome = $_POST['nome'];
$carga = $_POST['carga'];

$query = "insert into disciplinas (nome, cargaHoraria) values ('$nome', $carga)";

$resultado = mysqli_query($conexao, $query);
echo 'Foi inserido';

header("location: index.php"); 
die('Não ignore meu cabeçalho...');
?>