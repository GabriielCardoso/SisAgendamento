
<header>
    <h3>Excluir Cadastro</h3>
</header>
<?php
$idCadastro = mysqli_real_escape_string($conexão,$_GET["idCadastro"]);
$sql = "DELETE FROM tbcadastros WHERE idCadastro = '{$idCadastro}'";

mysqli_query($conexão,$sql) or die ("Erro ao excluir cadastro. " . mysqli_error($conexão));
?>

    <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Excluir Cadastro!</h4>
  <p>Cadastro excluido com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=cadastros">Voltar para Cadastro</a>
  </p>
  <hr>
</div>
<?php
?>