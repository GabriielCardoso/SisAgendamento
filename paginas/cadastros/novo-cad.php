<header>
    <h3><i class="bi bi-person-square"></i> Novo Cadastro</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-cadastro" method="post" novalidate>

        <div class="mb-3">
            <label class="form-label" for="nomeCadastro">Nome</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input class="form-control" type="text" name="nomeCadastro" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome!
            </div>
        </div>
    </div>

        <div class="mb-3">
            <label class="form-label" for="CPFCadastro">CPF</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-file-person"></i></span>
            <input class="form-control" type="text" name="CPFCadastro">
        </div>
    </div>

        <div class="mb-3">
            <label class="form-label" for="emailCadastro">E-mail</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
            <input class="form-control" type="email" name="emailCadastro">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="telefoneCadastro">Telefone</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input class="form-control" type="text" name="telefoneCadastro">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="enderecoCadastro">Endereço</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
            <input class="form-control" type="text" name="enderecoCadastro">
        </div>
    </div>

    <div class="row">
    <div class="mb-3 col-3">
            <label class="form-label" for="sexoCadastro">Sexo</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
            <select class="form-control" name="sexoCadastro" id="sexoCadastro">
                <option selected>Selecione o sexo</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
    </div>

        <div class="mb-3 col-3">
            <label class="form-label" for="dataNascCadastro">Data de Nascimento</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
            <input class="form-control" type="date" name="dataNascCadastro">
        </div>
    </div>
</div>
        
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>