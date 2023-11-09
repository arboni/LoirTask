<?php
include '../connection/conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id = '$id'";
$busca = mysqli_query($conexao, $sql);
$data = mysqli_fetch_assoc($busca);
$FullName = $data['Full name'];
$shortName = $data['apelido_projeto'];
    


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

    <?php include "navbar.php"; ?>

    <h1 style="text-align:center"><?php echo $FullName; ?> <a href="../forms/edit_project.php?id=<?php echo $id?>" class="btn btn-primary"> Atualizar</a></h1>
    
    <br>
    <h3 style="text-align:center">Lista de Tarefas</h3><br>
    <div class="col-md-12" style="text-align:right; margin-bottom:10px">
        <a href="../forms/form_task.php?id=<?php echo $id?>" class="btn btn-primary">Add Tarefa</a>
    </div>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Título da Tarefa</th>
                <th scope="col">Apelido</th>
                <th scope="col">Status</th>
                <th scope="col">Atualizar</th>
                <th scope="col">Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = "SELECT * FROM tasks WHERE project_id = '$id'";
                $busca = mysqli_query($conexao, $sql);
                while($data = mysqli_fetch_assoc($busca)){
                    $idTask = $data['id'];
                    $title = $data['title'];
                    $apelido = $data['task_name'];
                    $status = $data['state'];
          if($status =='1'){
           $status = "<span class='badge badge-warning'>Não Iniciado</span>";
        }elseif($status =='2'){
            $status = "<span class='badge badge-info'>Em andamento</span>";
        }elseif($status =='3'){
            $status = "<span class='badge badge-danger'>Paralizada</span>";
        }elseif($status =='4'){
            $status = "<span class='badge badge-success'>Concluída</span>";
        }
                    echo ' <tr>
                    <th scope="row">'.$idTask.'</th>
                    <td><a href="../forms/edit_task.php?id='.$idTask.'">'. $title.'</a></td>
                    <td><a href="../forms/edit_task.php?id='.$idTask.'">'. $apelido.'</a></td>
                    <td><a href="../forms/edit_task.php?id='.$idTask.'">'. $status.'</a></td>
                    <td><a href="../forms/edit_task.php?id='.$idTask.'" class="btn btn-primary">Atualizar</a></td>
                    <td><a href="../forms/delete_task.php?id='.$idTask.'" class="btn btn-danger">Excluir</a></td>
                </tr>';
                }
            ?>


        </tbody>
    </table>


    </div>

</body>

</html>