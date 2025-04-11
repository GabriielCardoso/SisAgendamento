<header>
    <h3>
    <i class="bi bi-list-task"></i> Atualizar TCO
    </h3>
</header>

<?php
   $idTco = strip_tags(mysqli_real_escape_string($conexão,$_POST["idTco"]));
   $AutorTco = strip_tags(mysqli_real_escape_string($conexão,$_POST["AutorTco"]));
   $VitimaTco = strip_tags(mysqli_real_escape_string($conexão,$_POST["VitimaTco"]));
   $Tco = strip_tags(mysqli_real_escape_string($conexão,$_POST["Tco"]));
   $Bco = strip_tags(mysqli_real_escape_string($conexão,$_POST["Bco"]));
   $dataTco = strip_tags(mysqli_real_escape_string($conexão,$_POST["dataTco"]));
   $horaTco = strip_tags(mysqli_real_escape_string($conexão,$_POST["horaTco"]));


   $sql = "UPDATE tbTco SET
   AutorTco = '{$AutorTco}',
   VitimaTco = '{$VitimaTco}',
   Tco = '{$Tco}',
   Bco = '{$Bco}',
   dataTco = '{$dataTco}', 
   horaTco = '{$horaTco}'
   
   WHERE idTco = '{$idTco}'
   ";
    $rs = mysqli_query($conexão, $sql) or die ("Erro ao executar a consulta" . mysqli_error());

    if($rs){
        ?>
        <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Atualizar Tco!</h4>
      <p>Tco atualizado com sucesso!</p>
      <hr>
      <p class="mb-0">
        <a href="?menuop=tco">Voltar para Tco</a>
      </p>
    </div>
        <?php
    }else{
        ?>
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Erro!</h4>
      <p>Erro ao atualizar Tco!</p>
      <hr>
      <p class="mb-0">
        <a href="?menuop=tco">Voltar para Tco</a>
      </p>
    </div>
        <?php
    }
    ?>