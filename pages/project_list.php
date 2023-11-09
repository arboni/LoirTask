<?php
include '../connection/conexao.php';
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

<div class="col-md-12" style="text-align:center; margin-bottom:10px"><a href="../forms/form_project.php" class="btn btn-primary">Add Projeto</a></div>
    <div class="table-responsive" style="text-align:center; ">
        <table class="table table-striped">

            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome Projeto</th>
                    <th scope="col">Apelido</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM projects";
                    $busca = mysqli_query($conexao, $sql);
                    while($data = mysqli_fetch_assoc($busca)){
                        $id = $data['id'];
                        $FullName = $data['Full name'];
                        $shortName = $data['apelido_projeto'];
                        echo ' <tr>
                        <th scope="row">'.$id.'</th>
                        <td><a href="project.php?id='.$id.'">'. $FullName.'</a></td>
                        <td><a href="project.php?id='.$id.'">'. $shortName.'</a></td>
                        <td><a href="../forms/form_task.php?id='.$id.'" class="btn btn-primary">Add Tarefa</a></td>
                      </tr>';
                    }
                    ?>


            </tbody>
        </table>
    </div>

</body>

</html>