<header>
    <h3>
    <i class="bi bi-list-task"></i> Cadastro de Agendamento
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-agendamento" method="post" novalidate>
        <div class="mb-3">
            <label for="nomeAgendamento" class="form-label">Nome</label>
            <input class="form-control" type="text" name="nomeAgendamento" id="nomeAgendamento" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome!
            </div>

            <label for="CPFAgendamento" class="form-label">CPF</label>
            <input class="form-control" type="text" name="CPFAgendamento" id="CPFAgendamento">
        </div>

        <div class="mb-3">
            <label for="descriçãoAgendamento" class="form-label">Descrição Agendamento</label>
            <textarea name="descriçãoAgendamento" id="descriçãoAgendamento" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataAgendamento" class="form-label">Data Agendamento</label>
                <input class="form-control" type="date" name="dataAgendamento" id="dataAgendamento" required>
                <div class="invalid-feedback">
                Por favor, preencha a data do Agendamento!
            </div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaAgendamento" class="form-label">Hora Agendamento</label>
                <input class="form-control" type="time" name="horaAgendamento" id="horaAgendamento" required>
                <div class="invalid-feedback">
                Por favor, preencha a hora do Agendamento!
            </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteAgendamento" class="form-label">Data Lembrete</label>
                <input class="form-control" type="date" name="dataLembreteAgendamento" id="dataLembreteAgendamento">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteAgendamento" class="form-label">Hora Lembrete</label>
                <input class="form-control" type="time" name="horaLembreteAgendamento" id="horaLembreteAgendamento">
            </div>
        </div>
        <div class="mb-3">
        <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>

