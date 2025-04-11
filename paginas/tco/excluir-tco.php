<header>
    <h3>Excluir TCO</h3>
</header>
<?php
$idTco = mysqli_real_escape_string($conexão,$_GET["idTco"]);
$sql = "DELETE FROM tbtco WHERE idTco = '{$idTco}'";

mysqli_query($conexão,$sql) or die ("Erro ao excluir TCO. " . mysqli_error($conexão));
?>

    <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Excluir Tco!</h4>
  <p>Tco excluido com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=tco">Voltar para Tco</a>
  </p>
  <hr>
</div>
<?php
?>