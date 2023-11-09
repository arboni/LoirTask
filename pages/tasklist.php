<?php
include '../connection/conexao.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js">
    </script>
    <title>Minhas Tarefas</title>


</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="table-responsive" style="text-align:center; ">


        <br>
        <h1>Lista de Tarefas</h1><br>
        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Apelido</th>
                    <th scope="col">Status </th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
      $sql = "SELECT * FROM tasks ";
      $busca = mysqli_query($conexao, $sql);
      while($data = mysqli_fetch_assoc($busca)){
          $idTask = $data['id'];
          $title = $data['title'];
          $task_name = $data['task_name'];
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
          <td>'. $title.'</td>
          <td>'. $task_name.'</td>
          <td>'.$status.'</td>
          <td><a href="../forms/edit_task.php?id='.$idTask.'" class="btn btn-primary">Atualizar</a></td>
          
        </tr>';
      }
      ?>

                <!-- <td><a href="../forms/edit_task.php?id='.$id.'" class="btn btn-primary">Atualizar</a></td> -->
            </tbody>
        </table>


    </div>

</body>


</html>