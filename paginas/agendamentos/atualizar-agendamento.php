<header>
    <h3>
    <i class="bi bi-list-task"></i> Atualizar Agendamento
    </h3>
</header>

<?php
   $idAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["idAgendamento"]));
   $nomeAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["nomeAgendamento"]));
   $CPFAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["CPFAgendamento"]));
   $descriçãoAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["descriçãoAgendamento"]));
   $dataAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["dataAgendamento"]));
   $horaAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["horaAgendamento"]));
   $dataLembreteAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["dataLembreteAgendamento"]));
   $horaLembreteAgendamento = strip_tags(mysqli_real_escape_string($conexão,$_POST["horaLembreteAgendamento"]));

   $sql = "UPDATE tbagendamento SET
   nomeAgendamento = '{$nomeAgendamento}',
   CPFAgendamento = '{$CPFAgendamento}',
   descriçãoAgendamento = '{$descriçãoAgendamento}',
   dataAgendamento = '{$dataAgendamento}',
   horaAgendamento = '{$horaAgendamento}', 
   dataLembreteAgendamento = '{$dataLembreteAgendamento}',
   horaLembreteAgendamento = '{$horaLembreteAgendamento}'
   WHERE idAgendamento = '{$idAgendamento}'
   ";
    $rs = mysqli_query($conexão, $sql) or die ("Erro ao executar a consulta" . mysqli_error());

    if($rs){
        ?>
        <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Atualizar Agendamento!</h4>
      <p>Agendamento atualizado com sucesso!</p>
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
      <p>Erro ao atualizar agendamento!</p>
      <hr>
      <p class="mb-0">
        <a href="?menuop=agendamentos">Voltar para Agendamento</a>
      </p>
    </div>
        <?php
    }
    ?>