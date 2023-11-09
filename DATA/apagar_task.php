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



$sql = "DELETE FROM `tasks` WHERE id = '$id'";
 $inserir = mysqli_query($conexao,$sql);
 $teste = mysqli_affected_rows($conexao);
 
 if($teste ==1) {
    echo  "<script>alert('Tarefa atuaexcluída do sistema!);</script>";
    header("Location: ../pages/index.php");
    

 }
 else{
   

 }



?>