<style>
        body {
            background: no-repeat, url("foto.jpg");
            background-size: 100vw 100vh;
        }
    </style>

<form method="post" action="cadastrardiciplinaback.php">
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