<header>
    <h3>
    <i class="bi bi-list-task"></i> Inserir Agendamento
    </h3>
</header>
<?php

$nomeAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['nomeAgendamento']));
$CPFAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['CPFAgendamento']));
$descriçãoAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['descriçãoAgendamento']));
$dataAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['dataAgendamento']));
$horaAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['horaAgendamento']));
$dataLembreteAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['dataLembreteAgendamento']));
$horaLembreteAgendamento = strip_tags( mysqli_real_escape_string($conexão,$_POST['horaLembreteAgendamento']));

$sql = "INSERT INTO tbagendamento
(
    nomeAgendamento,
    CPFAgendamento,
    descriçãoAgendamento,
    dataAgendamento,
    horaAgendamento,
    dataLembreteAgendamento,
    horaLembreteAgendamento
)
VALUES 
(
    '{$nomeAgendamento}',
    '{$CPFAgendamento}',
    '{$descriçãoAgendamento}',
    '{$dataAgendamento}',
    '{$horaAgendamento}',
    '{$dataLembreteAgendamento}',
    '{$horaLembreteAgendamento}'
)
";

$rs = mysqli_query($conexão, $sql);

if($rs){
    ?>
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Inserir Agendamento!</h4>
  <p>Agendamento inserido com sucesso!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=agendamentos">Voltar para Agendamento</a>
  </p>
</div>
    <?php
}else{
    ?>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Erro!</h4>
  <p>Erro ao inserir agendamento!</p>
  <hr>
  <p class="mb-0">
    <a href="?menuop=agendamentos">Voltar para Agendamento</a>
  </p>
</div>
    <?php
}
?>