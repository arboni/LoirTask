<?php
include "../connection/conexao.php";

$id = $_POST['id'];
$FullName = $_POST['fullName'];
$apelido = $_POST['apelido'];
$description = $_POST['description'];
$start = $_POST['start'];
$end = $_POST['end'];
$resp = $_POST['resp'];
$desc = $_POST['description'];



$sql = "UPDATE `projects` SET `Full name`='$FullName',`apelido_projeto`='$apelido',
`start`='$start',`end`='$end',`resp`='$resp', `desc` = '$desc' 
WHERE id = '$id'";
 $inserir = mysqli_query($conexao,$sql);
 $teste = mysqli_affected_rows($conexao);
 
 if($teste ==1) {
    
   
    $mensagem = "Projeto atualizado com sucesso";
}
else{
    $mensagem = "Erro";
}

header("Location: ../pages/index.php");
?>
<script>
alert("<?php echo $mensagem ?>");
</script>



