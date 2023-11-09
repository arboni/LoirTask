<?php
include "../connection/conexao.php";


$title = $_POST['title'];
$apelido = $_POST['apelido'];
$description = $_POST['description'];
$state = $_POST['state'];
$start = $_POST['start'];
$end = $_POST['end'];
$resp = $_POST['resp'];
$desc = $_POST['description'];


$sql = "INSERT INTO `projects`( `Full name`, `apelido_projeto`, `start`, `end`, `resp`, `desc`) 
        VALUES ('$title','$apelido','$start','$end','$resp','$desc')";
 $inserir = mysqli_query($conexao,$sql);
 $teste = mysqli_affected_rows($conexao);
 
 if($teste ==1) {
    
   
        $mensagem = "Projeto inserido com sucesso";
    }
    else{
        $mensagem = "Erro";
    }
    header("Location: ../pages/index.php");
?>
<script>
alert("<?php echo $mensagem ?>");
</script>



