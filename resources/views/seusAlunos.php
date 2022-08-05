<?php

// pega qual materia do prof
 $conexao = new mysqli("localhost","root","","trabalho");

 $prof = $_GET["professor"];

 $query = "select disciplina from professores where id = ".$prof;

 $resultado = mysqli_query($conexao, $query);

 while (
    $resultado2 = mysqli_fetch_array($resultado)
) {
    $dis = $resultado2["disciplina"];
};
// pega qual materia do prof


// pega os alunos da materia
$query2 = "select alunos.nome as a from alunos join alunodisciplina on alunos.id = alunodisciplina.aluno where alunodisciplina.disciplina = ".$dis;

$resultado3 = mysqli_query($conexao, $query2);

while (
    $resultado4 = mysqli_fetch_array($resultado3)
) {
    $a[] = $resultado4["a"];
};
// pega os alunos da materia

// pega o aluno de maior nota
$query3 = "select alunos.nome as a, alunodisciplina.nota as b from alunos join alunodisciplina on alunos.id = alunodisciplina.aluno where alunodisciplina.disciplina = ".$dis." order by b desc limit 1";

$result = mysqli_query($conexao, $query3);

while (
    $result2 = mysqli_fetch_array($result)
) {
    $maiornotaluno = $result2["a"];
    $maiornotanota = $result2["b"];
};
// pega o aluno de maior nota

$c = 1
?>
<style>
        body {
            background: no-repeat, url("foto.jpg");
            background-size: 100vw 100vh;
            color: white;
        }
table{
    font-size: 18px;
}
    </style>
    <h1>Aluno com maior nota na materia: <?php echo($maiornotaluno) ?>  com nota: <?php echo($maiornotanota) ?></h1>


    <h1>Lista de Alunos do professor</h1>
<table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Aluno</th>
            </tr>
        </thead>
        <tbody>
            <?php   foreach ($a as $aluno) { ?>
                <tr>
                    <th scope="row"><?= $c?></th>
                    <td><?= $aluno?></td>
                </tr>
                <?php $c++; } ?>
        </tbody>
    </table>

