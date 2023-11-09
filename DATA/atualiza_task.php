<?php
include "../connection/conexao.php";

$id = $_POST['idTask'];
$project_id = $_POST['project_id'];
$title = $_POST['title'];
$apelido = $_POST['apelido'];
$description = $_POST['description'];
$state = $_POST['state'];
$start = $_POST['start'];
$end = $_POST['end'];
$resp = $_POST['resp'];



$sql = "UPDATE `tasks` SET`project_id`='$project_id',`title`='$title',`task_name`='$apelido',
`task_desc`='$description',`state`='$state',`start_date`='$start',`end_date`='$end', `resp` = '$resp' 
WHERE id = '$id'";
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



