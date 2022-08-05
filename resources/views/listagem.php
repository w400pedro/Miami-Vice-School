<?php

    $conexao = new mysqli("localhost","root","","trabalho");

    $query = "select * from alunos";
    $queryProfessor = "select professores.id, professores.nome, disciplinas.nome as disciplina from professores left join disciplinas on disciplinas.id = professores.disciplina";

    $resultado = mysqli_query($conexao, $query);
    $resultadoProfessor = mysqli_query($conexao, $queryProfessor);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
            <th scope="col">#</th>
            <th scope="col">Aluno</th>
            <th scope="col">Email</th>
            <th scope="col">Matrícula</th>
            <th scope="col">#</th>
            <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php   while($teste = mysqli_fetch_array($resultado)) {

               ?>
                <tr>
                    <th scope="row"><?= $teste['id']?></th>
                    <td><?= $teste['nome']?></td>
                    <td><?= $teste['email']?></td>
                    <td><?= $teste['matricula']?></td>
                    <td><form  action="alunoDisciplina" method="get">
                        <input type="hidden" name="aluno" value="<?=$teste['id']?>">
                        <button type="submit" class="btn btn-primary">Cadastrar na disciplina</button>
                        </form>
                    </td>
                    <td><form action="suasDisciplina" method="get">
                        <input type="hidden" name="aluno" value="<?=$teste['id']?>">
                        <button type="submit" class="btn btn-primary">Ver disciplinas</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Professor</th>
            <th scope="col">Disciplina</th>
            <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php   while($teste2 = mysqli_fetch_array($resultadoProfessor)) { ?>
                <tr>
                    <th scope="row"><?= $teste2['id']?></th>
                    <td><?= $teste2['nome']?></td>
                    <td><?= $teste2['disciplina']?></td>
                    <td><form action="seusAlunos" method="get">
                        <input type="hidden" name="professor" value="<?=$teste2['id']?>">
                        <button type="submit" class="btn btn-primary">Ver Alunos</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
    <br><br><br>
    <form action="index.php">
        <button type="submit" class="btn btn-primary">Voltar</button>
    </form>
</body>
</html>
