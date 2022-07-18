<?php

$conexao = new mysqli("localhost","root","","trabalho");
$query = "select id, nome from disciplinas";
$resultado = mysqli_query($conexao, $query);
if(!empty($_POST)) {
    if($_POST['aluno'] != '') {

        $disciplina = $_POST['disciplina'];
        $aluno = $_POST['aluno']; 
        $nota = $_POST['nota']; 
        $frequencia = $_POST['frequencia']; 
        $queryInsert = "insert into alunodisciplina (disciplina, aluno, nota, frequencia) values ($disciplina, $aluno, $nota, $frequencia)";
        
        $resultado = mysqli_query($conexao, $queryInsert);
        header("location: index.php"); 
        die;
    }
    die;
}
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: no-repeat, url("foto.jpg");
            background-size: 100vw 100vh;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form method="post" action="alunoDisciplina.php">
        <h1>Cadastrar aluno na disciplina</h1>
        <div class="mb-3">
            <input type="hidden" name="aluno" value="<?= $_GET['aluno']?>">
            <label for="exampleInputEmail1" class="form-label">Disciplina</label>
            <select name="disciplina" id="" class="form-select" aria-label="Default select example">

                <?php   while($teste = mysqli_fetch_array($resultado)) { ?>
                    <option value="<?=$teste['id']?>"><?=$teste['nome']?></option>
                <?php } ?>
            </select>
        </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nota</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="nota" max="10" min="0">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Frequência</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="frequencia" max="100" min="0">
            </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>