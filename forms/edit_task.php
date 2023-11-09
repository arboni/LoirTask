<?php
include "../connection/conexao.php";

$idTask =  $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = '$idTask'";
    $busca = mysqli_query($conexao, $sql);
    $data = mysqli_fetch_assoc($busca);
    $title = $data['title'];
    $project_id = $data['project_id'];
    $apelido = $data['task_name'];
    $stat = $data['state'];
    $start = $data['start_date'];
    $end = $data['end_date'];
    $desc = $data['task_desc'];
    $resp = $data['resp'];
    if($stat =='1'){
        $status = "<span class='badge badge-warning'>Não Iniciado</span>";
     }elseif($stat =='2'){
         $status = "<span class='badge badge-info'>Em andamento</span>";
     }elseif($stat =='3'){
         $status = "<span class='badge badge-danger'>Paralizada</span>";
     }elseif($stat =='4'){
         $status = "<span class='badge badge-success'>Concluída</span>";
     }
        
     $sql = "SELECT * FROM projects WHERE id = '$project_id'";
     $busca = mysqli_query($conexao, $sql);
     $data = mysqli_fetch_assoc($busca);
     $FullName = $data['Full name'];
    
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
    <h1 style="text-align:center">Atualizar Tarefa</h1>

    <div class="jumbotron">
        <form method="POST" action="../DATA/atualiza_task.php">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nome Completo do Projeto</label>
                <input type="text" class="form-control" name="fullName" readonly='true' id="exampleFormControlInput1"
                    value="<?php echo $FullName; ?>">
                <input type="number" class="form-control" style="display:none" readonly='true' name="project_id"
                    id="exampleFormControlInput1" value="<?php echo $project_id; ?>">
                <input type="number" class="form-control" style="display:none" readonly='true' name="idTask"
                    id="exampleFormControlInput1" value="<?php echo $idTask; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Título da Tarefa</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                    value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apelido (Nome para facilitar a associação)</label>
                <input type="text" class="form-control" name="apelido" id="exampleFormControlInput1"
                    value="<?php echo $apelido ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Status <?php echo $status ?></label>
                <select class="form-control" id="exampleFormControlSelect1" name="state">
                    <option value="1" <?=($stat == '1')?'selected':''?>>Não Iniciado</option>
                    <option value="2" <?=($stat == '2')?'selected':''?>>Em andamento</option>
                    <option value="3" <?=($stat == '3')?'selected':''?>>Paralizado</option>
                    <option value="4" <?=($stat == '4')?'selected':''?>>Concluído</option>
                </select>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de Início da Tarefa</label>
                    <input type="date" class="form-control" name="start" value="<?php echo $start ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Data de Término</label>
                    <input type="date" class="form-control" name="end" value="<?php echo $end ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Responsável pela Tarefa</label>
                <input type="text" class="form-control" name="resp" id="exampleFormControlInput1"
                    value="<?php echo $resp ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descrição da Tarefa</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"><?php echo $desc ;?>
                </textarea>
            </div>

            <div class="col-md-12" style="text-align:right">
                <a href="../pages/index.php" type="button" class="btn btn-danger">cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>

</body>

</html>