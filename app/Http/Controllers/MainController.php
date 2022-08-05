<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class MainController extends Controller
{
    public function registra()
    {
        $conexao = mysqli_connect("localhost", "root", '', "trabalho");

        $matricula = '';
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        for ($c = 0; $c < 10; $c++) {
            $matricula .= rand(0, 9);
        }


        $query = "insert into alunos (nome, email, matricula) values ('$nome', '$email', '$matricula')";

        $resultado = mysqli_query($conexao, $query);

        return redirect('/');
    }

    public function cadastrarProfessor()
    {
        $conexao = mysqli_connect("localhost", "root", '', "trabalho");

        $nome = $_POST['nomeProfessor'];
        $disciplina = $_POST['disciplina'];

        $query = "insert into professores (nome, disciplina) values ('$nome', $disciplina)";

        $resultado = mysqli_query($conexao, $query);

        return redirect('/');
    }

    public function alunoDisciplinaCadastra()
    {
        $conexao = mysqli_connect("localhost", "root", '', "trabalho");
        $query = "select id, nome from disciplinas";
        $resultado = mysqli_query($conexao, $query);
        if (!empty($_POST)) {
            if ($_POST['aluno'] != '') {

                $disciplina = $_POST['disciplina'];
                $aluno = $_POST['aluno'];
                $nota = $_POST['nota'];
                $frequencia = $_POST['frequencia'];
                $queryInsert = "insert into alunodisciplina (disciplina, aluno, nota, frequencia) values ($disciplina, $aluno, $nota, $frequencia)";

                $resultado = mysqli_query($conexao, $queryInsert);
                return redirect('/');
                die;
            }
            die;
        }
    }

    public function cadastrardiciplinaback()
    {
        $conexao = mysqli_connect("localhost", "root", '', "trabalho");

        $nome = $_POST['nome'];
        $carga = $_POST['carga'];

        $query = "insert into disciplinas (nome, cargaHoraria) values ('$nome', $carga)";

        $resultado = mysqli_query($conexao, $query);
        echo 'Foi inserido';

        return redirect('/');
        die('Não ignore meu cabeçalho...');
    }
}
