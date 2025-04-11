<?php
$idTco = $_GET["idTco"];

$sql = "SELECT * FROM tbtco WHERE idTco = '$idTco'";

$rs = mysqli_query($conexão, $sql) or die ("Erro ao recuperar os dados do Tco" . mysqli_error($conexão));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>
    <i class="bi bi-paperclip"></i> Editar TCO
    </h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=atualizar-tco" method="post" novalidate>

        <div class="mb-3 col-3">
            <label for="idTco" class="form-label">ID</label>
            <input class="form-control" type="text" name="idTco" id="idTco" value="<?=$dados["idTco"]?>" readonly>
            </div>

        <div class="mb-3">
            <label for="AutorTco" class="form-label">Autor</label>
            <input class="form-control" type="text" name="AutorTco" id="AutorTco" value="<?=$dados["AutorTco"]?>" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome do Autor!
            </div>

            <label for="VitimaTco" class="form-label">Vitma</label>
            <input class="form-control" type="text" name="VitimaTco" id="VitimaTco" value="<?=$dados["VitimaTco"]?>" required>
            <div class="invalid-feedback">
                Por favor, preencha o nome da Vitima!
        </div>

        <div class="mb-3">
            <label for="Tco" class="form-label">TCO</label>
            <input class="form-control" type="text" name="Tco" id="Tco" value="<?=$dados["Tco"]?>">
        </div>

        <div class="mb-3">
            <label for="Bco" class="form-label">BCO</label>
            <input class="form-control" type="text" name="Bco" id="Bco" value="<?=$dados["Bco"]?>">
        </div>

        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataTco" class="form-label">Data Tco</label>
                <input class="form-control" type="date" name="dataTco" id="dataTco" value="<?=$dados["dataTco"]?>" required>
                <div class="invalid-feedback">
                Por favor, preencha a data do Tco!
            </div>
            </div>
            <div class="mb-3 col-3">
                <label for="horaTco" class="form-label">Hora Tco</label>
                <input class="form-control" type="time" name="horaTco" id="horaTco" value="<?=$dados["horaTco"]?>" required>
                <div class="invalid-feedback">
                Por favor, preencha a hora do Tco!
            </div>
            </div>
        </div>
        
        <div class="mb-3">
        <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>