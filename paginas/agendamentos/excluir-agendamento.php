<header>
    <h3>Excluir Agendamento</h3>
</header>
<?php
$idAgendamento = mysqli_real_escape_string($conexão,$_GET["idAgendamento"]);
$sql = "DELETE FROM tbagendamento WHERE idAgendamento = '{$idAgendamento}'";

mysqli_query($conexão,$sql) or die ("Erro ao excluir agendamento. " . mysqli_error($conexão));
?>

    <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Excluir Agendamento!</h4>
  <p>Agendamento excluido com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=agendamentos">Voltar para agendamento</a>
  </p>
  <hr>
</div>
<?php
?>