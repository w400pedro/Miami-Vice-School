<?php

    $conexao = new mysqli("localhost","root","","trabalho");
    $query = "select id, nome from alunos where id = ".$_GET['aluno'];
    $queryMaterias = "select disciplinas.id, disciplinas.nome, alunodisciplina.nota, alunodisciplina.frequencia from alunos left join alunodisciplina on alunodisciplina.aluno = alunos.id left join disciplinas on disciplinas.id = alunodisciplina.disciplina where alunos.id = ".$_GET['aluno'];
    $resultado = mysqli_query($conexao, $query);
    $resultadoMaterias = mysqli_query($conexao, $queryMaterias);
    $testeAluno =  mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: no-repeat, url("foto.jpg");
            background-size: 100vw 100vh;
        }
        table {
            background-color: white;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <br><br><br><br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Aluno</th>
                <th scope="col">Matéria</th>
                <th scope="col">Média final</th>
                <th scope="col">Frequência</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            <?php  while($teste = mysqli_fetch_array($resultadoMaterias)) { ?>
                <tr>
                    <th scope="row"><?= $testeAluno['nome']?></th>
                    <td><?= $teste['nome']?></td>
                    <td><?= $teste['nota']?></td>
                    <td><?= $teste['frequencia']?>%</td>
                    <?php
                    if($teste["nota"] < 7 || $teste["frequencia"] < 75){
                        ?>    <td style="color: red">Rodado</td>
                    <?php }else{ ?>
                        <td style="color: green">Passado</td>
                    <?php
                        }
                    ?>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <form action="/">
        <button type="submit" class="btn btn-primary">Voltar</button>
    </form>
</body>
</html>
