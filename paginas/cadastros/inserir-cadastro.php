<head>
    <h3>Inserir Cadastro</h3>
</head>
<?php

    $nomeCadastro = mysqli_real_escape_string($conexão,$_POST["nomeCadastro"]);
    $CPFCadastro = mysqli_real_escape_string($conexão,$_POST["CPFCadastro"]);
    $emailCadastro = mysqli_real_escape_string($conexão,$_POST["emailCadastro"]);
    $telefoneCadastro = mysqli_real_escape_string($conexão,$_POST["telefoneCadastro"]);
    $enderecoCadastro = mysqli_real_escape_string($conexão,$_POST["enderecoCadastro"]);
    $sexoCadastro = mysqli_real_escape_string($conexão,$_POST["sexoCadastro"]);
    $dataNascCadastro = mysqli_real_escape_string($conexão,$_POST["dataNascCadastro"]);
    $sql = "INSERT INTO tbcadastros (
    nomeCadastro, 
    CPFCadastro, 
    emailCadastro, 
    telefoneCadastro, 
    enderecoCadastro, 
    sexoCadastro, 
    dataNascCadastro)
    VALUES(
        '{$nomeCadastro}',
        '{$CPFCadastro}', 
        '{$emailCadastro}', 
        '{$telefoneCadastro}', 
        '{$enderecoCadastro}',
        '{$sexoCadastro}', 
        '{$dataNascCadastro}'
    )
    ";
    mysqli_query($conexão,$sql) or die("Erro ao executar a consulta." . mysqli_error($conexão));

    ?>

    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Inserir Cadastro!!</h4>
  <p>Cadastro inserido com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=cadastros">Voltar para Cadastro</a>
  </p>
  <hr>
</div>
<?php
?>