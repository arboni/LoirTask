<?php
include "../connection/conexao.php";

$project_id = $_POST['project_id'];
$title = $_POST['title'];
$apelido = $_POST['apelido'];
$description = $_POST['description'];
$state = $_POST['state'];
$start = $_POST['start'];
$end = $_POST['end'];
$resp = $_POST['resp'];


$sql = "INSERT INTO `tasks`(`project_id`, `title`, `task_name`, `task_desc`, `state`, `start_date`, `end_date`, `resp`)  
VALUES ('$project_id','$title','$apelido','$description','$state','$start','$end', '$resp')";
 $inserir = mysqli_query($conexao,$sql);
 $teste = mysqli_affected_rows($conexao);
 
 if($teste ==1) {
    
   
        $mensagem = "Tarefa inserida com sucesso";
    }
    else{
        $mensagem = "Erro";
    }
    header("Location: ../pages/index.php");
?>
<script>
alert("<?php echo $mensagem ?>");
</script>



