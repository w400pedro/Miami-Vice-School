<?php

    $conexao = new mysqli("localhost","root","","trabalho");
    $query = "select id, nome from disciplinas";
    $resultado = mysqli_query($conexao, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
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

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <img src="../public/foto.jpg" alt="">
    <form method="post" action="{{ url('registra') }}">
    @csrf
        <h1>Cadastro de alunos</h1>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nome</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="nome">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    <br><br><br>
    <form method="post" action="{{ url('cadastrarProfessor') }}">
    @csrf
        <h1>Cadastro de professores</h1>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nome</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="nomeProfessor">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Disciplina</label>
            @csrf
            <select name="disciplina" id="" class="form-select" aria-label="Default select example">

                <?php   while($teste = mysqli_fetch_array($resultado)) { ?>
                    <option value="<?=$teste['id']?>"><?=$teste['nome']?></option>
                <?php } ?>
            </select>
            @csrf
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    <br>
    <br>
    <br>

    <form action="{{ url('listagem') }}">
    @csrf
        <button type="submit" class="btn btn-primary">Listagem de alunos e professores</button>
    </form>
    <br>
    <form method="post" action="{{ url('cadastrardiciplinaback') }}">
    @csrf
        <h1>Cadastro de Disciplina</h1>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" aria-describedby="emailHelp" name="nome">
        </div>
        <div class="mb-3">
            <label for="carga" class="form-label">Carga Horaria</label>
            <input type="text" class="form-control" id="carga" name="carga">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</body>
</html>
