<header>
    <h3>
    <i class="bi bi-list-task"></i> Inserir TCO
    </h3>
</header>
<?php

$AutorTco = strip_tags( mysqli_real_escape_string($conexão,$_POST['AutorTco']));
$VitimaTco = strip_tags( mysqli_real_escape_string($conexão,$_POST['VitimaTco']));
$Tco = strip_tags( mysqli_real_escape_string($conexão,$_POST['Tco']));
$Bco = strip_tags( mysqli_real_escape_string($conexão,$_POST['Bco']));
$dataTco = strip_tags( mysqli_real_escape_string($conexão,$_POST['dataTco']));
$horaTco = strip_tags( mysqli_real_escape_string($conexão,$_POST['horaTco']));


$sql = "INSERT INTO tbtco
(
    AutorTco,
    VitimaTco,
    Tco,
    Bco,
    dataTco,
    horaTco
    
)
VALUES 
(
    '{$AutorTco}',
    '{$VitimaTco}',
    '{$Tco}',
    '{$Bco}',
    '{$dataTco}',
    '{$horaTco}'
)
";

$rs = mysqli_query($conexão, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Inserir TCO!</h4>
  <p>TCO inserido com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tco">Voltar para TCO</a>
  </p>
</div>
    <?php
}else{
    ?>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Erro!</h4>
  <p>Erro ao inserir TCO!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tco">Voltar para TCO</a>
  </p>
</div>
    <?php
}
?>