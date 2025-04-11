<head>
    <h3>Atualizar Cadastro</h3>
</head>
<?php
    $idCadastro = mysqli_real_escape_string($conexão,$_POST["idCadastro"]);
    $nomeCadastro = mysqli_real_escape_string($conexão,$_POST["nomeCadastro"]);
    $CPFCadastro = mysqli_real_escape_string($conexão,$_POST["CPFCadastro"]);
    $emailCadastro = mysqli_real_escape_string($conexão,$_POST["emailCadastro"]);
    $telefoneCadastro = mysqli_real_escape_string($conexão,$_POST["telefoneCadastro"]);
    $enderecoCadastro = mysqli_real_escape_string($conexão,$_POST["enderecoCadastro"]);
    $sexoCadastro = mysqli_real_escape_string($conexão,$_POST["sexoCadastro"]);
    $dataNascCadastro = mysqli_real_escape_string($conexão,$_POST["dataNascCadastro"]);
    $sql = "UPDATE tbcadastros SET
    nomeCadastro = '{$nomeCadastro}',
    CPFCadastro = '{$CPFCadastro}',
    emailCadastro = '{$emailCadastro}',
    telefoneCadastro = '{$telefoneCadastro}',
    enderecoCadastro = '{$enderecoCadastro}',
    sexoCadastro = '{$sexoCadastro}',
    dataNascCadastro = '{$dataNascCadastro}'
    WHERE idCadastro = '{$idCadastro}'
    ";
    mysqli_query($conexão,$sql) or die("Erro ao executar a atualização." . mysqli_error($conexão));

    ?>

    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Editar Cadastro!</h4>
  <p>Cadastro editado com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=cadastros">Voltar para Cadastro</a>
  </p>
  <hr>
</div>
<?php
?>