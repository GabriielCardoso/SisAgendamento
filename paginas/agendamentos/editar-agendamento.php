<?php
$idAgendamento = $_GET["idAgendamento"];

$sql = "SELECT * FROM tbagendamento WHERE idAgendamento = '$idAgendamento'";

$rs = mysqli_query($conexão, $sql) or die ("Erro ao recuperar os dados do Agendamento" . mysqli_error($conexão));
$dados = mysqli_fetch_assoc($rs);
?>
 
<header>
    <h3>
    <i class="bi bi-list-task"></i> Editar Agendamento
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-agendamento" method="post" novalidate>

        <div class="mb-3 col-3">
            <label for="idAgendamento" class="form-label">ID</label>
            <input class="form-control" type="text" name="idAgendamento" id="idAgendamento" value="<?=$dados["idAgendamento"]?>" readonly>
            </div>

        <div class="mb-3">
            <label for="nomeAgendamento" class="form-label">Nome</label>
            <input class="form-control" type="text" name="nomeAgendamento" id="nomeAgendamento" value="<?=$dados["nomeAgendamento"]?>" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome!
            </div>

            <label for="CPFAgendamento" class="form-label">CPF</label>
            <input class="form-control" type="text" name="CPFAgendamento" id="CPFAgendamento" value="<?=$dados["CPFAgendamento"]?>">
        </div>

        <div class="mb-3">
            <label for="descriçãoAgendamento" class="form-label">Descrição Agendamento</label>
            <textarea name="descriçãoAgendamento" id="descriçãoAgendamento" cols="30" rows="5" class="form-control"><?=$dados["descriçãoAgendamento"]?></textarea>
        </div>

        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataAgendamento" class="form-label">Data Agendamento</label>
                <input class="form-control" type="date" name="dataAgendamento" id="dataAgendamento" value="<?=$dados["dataAgendamento"]?>" required>
                <div class="invalid-feedback">
                Por favor, preencha a data do Agendamento!
            </div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaAgendamento" class="form-label">Hora Agendamento</label>
                <input class="form-control" type="time" name="horaAgendamento" id="horaAgendamento" value="<?=$dados["horaAgendamento"]?>" required>
                <div class="invalid-feedback">
                Por favor, preencha a hora do Agendamento!
            </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteAgendamento" class="form-label">Data Lembrete</label>
                <input class="form-control" type="date" name="dataLembreteAgendamento" id="dataLembreteAgendamento" value="<?=$dados["dataLembreteAgendamento"]?>">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteAgendamento" class="form-label">Hora Lembrete</label>
                <input class="form-control" type="time" name="horaLembreteAgendamento" id="horaLembreteAgendamento" value="<?=$dados["horaLembreteAgendamento"]?>">
            </div>
        </div>
        <div class="mb-3">
        <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>

