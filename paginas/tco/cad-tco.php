<header>
    <h3>
    <i class="bi bi-paperclip"></i> Cadastro de TCO
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir-tco" method="post" novalidate>
        <div class="mb-3">
            <label for="AutorTco" class="form-label">Autor</label>
            <input class="form-control" type="text" name="AutorTco" id="AutorTco" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome do Autor!
            </div>


        <form class="needs-validation" action="index.php?menuop=inserir-tco" method="post" novalidate>
            <div class="mb-3">
            <label for="VitimaTco" class="form-label">Vitima</label>
            <input class="form-control" type="text" name="VitimaTco" id="VitimaTco" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome da Vitima!
        </div>

        <div class="mb-3">
            <label for="Tco" class="form-label">TCO</label>
            <input class="form-control" type="text" name="Tco" id="Tco">
        </div>

        <div class="mb-3">
            <label for="Bco" class="form-label">BCO</label>
            <input class="form-control" type="text" name="Bco" id="Bco">
        </div>

        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataTco" class="form-label">Data TCO</label>
                <input class="form-control" type="date" name="dataTco" id="dataTco" required>
                <div class="invalid-feedback">
                Por favor, preencha a data do TCO!
            </div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaTco" class="form-label">Hora TCO</label>
                <input class="form-control" type="time" name="horaTco" id="horaTco" required>
                <div class="invalid-feedback">
                Por favor, preencha a hora do TCO!
            </div>
            </div>
        </div>
        
        <div class="mb-3">
        <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>