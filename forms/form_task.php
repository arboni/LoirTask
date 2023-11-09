<?php
include "../connection/conexao.php";

$idProject =  $_GET['id'];
    $sql = "SELECT * FROM projects WHERE id = '$idProject'";
    $busca = mysqli_query($conexao, $sql);
    $data = mysqli_fetch_assoc($busca);
    $FullName = $data['Full name'];
    $shortName = $data['project_short_name'];
        
    
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <title>Minhas Tarefas</title>


</head>

<body>
    <?php include "../pages/navbar.php"; ?>
    <h1 style="text-align:center">Inserir Tarefa</h1>

    <div class="jumbotron">
        <form method="POST" action="../DATA/insert_task.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome Completo do Projeto</label>
                <input type="text" class="form-control" name="fullName" readonly='true' id="exampleFormControlInput1"
                    value="<?php echo $FullName; ?>">
                <input type="number" class="form-control" readonly='true' style="display:none" name="project_id"
                    id="exampleFormControlInput1" value="<?php echo $idProject; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Título da Tarefa</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                    placeholder="Exemplo - encaminhar relatórios....">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apelido (Nome para facilitar a associação)</label>
                <input type="text" class="form-control" name="apelido" id="exampleFormControlInput1"
                    placeholder="Exemplo - Relatórios Financeiros">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control" id="exampleFormControlSelect1" name="state">
                    <option value="1">Não Iniciado</option>
                    <option value="2">Em andamento</option>
                    <option value="3">Paralizado</option>
                    <option value="4">Concluído</option>
                </select>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de Início da Tarefa</label>
                    <input type="date" class="form-control" name="start" id="exampleFormControlInput1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de Término</label>
                    <input type="date" class="form-control" name="end" id="exampleFormControlInput1">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Responsável pela Tarefa</label>
                <input type="text" class="form-control" name="resp" id="exampleFormControlInput1"
                    placeholder="Nome do Responsável....">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição da Tarefa</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"
                    placeholder="Descrição das atividades relacionadas a tarefa..."></textarea>
            </div>
            
            <div class="col-md-12" style="text-align:right">
            <a href="../pages/index.php" type="button" class="btn btn-danger">cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar tarefa</button>
            </div>
    
    </form>
    </div>

</body>

</html>