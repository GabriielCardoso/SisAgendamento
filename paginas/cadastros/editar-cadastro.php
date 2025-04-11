<?php
$idCadastro = $_GET["idCadastro"];

$sql = "SELECT * FROM tbcadastros WHERE idCadastro = {$idCadastro}";
$rs = mysqli_query($conexão, $sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexão));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3><i class="bi bi-pencil-square"></i> Editar Cadastro</h3>
</header>

<div class="row">

    <div class="col-7">
        <form class="needs-validation" action="index.php?menuop=atualizar-cadastro" method="post" novalidate>
            <div class="row">
                <div class="mb-2 col-6">
                    <label class="form-label" for="idCadastro">ID</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                        <input class="form-control" type="text" name="idCadastro" value="<?=$dados["idCadastro"]?>" readonly required>
                    </div>
                </div>

                <div class="mb-2 col-6">
                    <label class="form-label" for="nomeCadastro">Nome</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input class="form-control" type="text" name="nomeCadastro" value="<?=$dados["nomeCadastro"]?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-2 col-6">
                    <label class="form-label" for="CPFCadastro">CPF</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-file-person"></i></span>
                        <input class="form-control" type="text" name="CPFCadastro" value="<?=$dados["CPFCadastro"]?>">
                    </div>
                </div>

                <div class="mb-2 col-6">
                    <label class="form-label" for="emailCadastro">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                        <input class="form-control" type="email" name="emailCadastro" value="<?=$dados["emailCadastro"]?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-2 col-6">
                    <label class="form-label" for="telefoneCadastro">Telefone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                        <input class="form-control" type="text" name="telefoneCadastro" value="<?=$dados["telefoneCadastro"]?>">
                    </div>
                </div>

                <div class="mb-2 col-6">
                    <label class="form-label" for="enderecoCadastro">Endereço</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                        <input class="form-control" type="text" name="enderecoCadastro" value="<?=$dados["enderecoCadastro"]?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-2 col-6">
                    <label class="form-label" for="sexoCadastro">Sexo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                        <select class="form-control" name="sexoCadastro">
                            <option <?php echo ($dados['sexoCadastro'] == '') ? 'selected' : '' ?> value>Selecione o sexo</option>
                            <option <?php echo ($dados['sexoCadastro'] == 'M') ? 'selected' : '' ?> value="M">Masculino</option>
                            <option <?php echo ($dados['sexoCadastro'] == 'F') ? 'selected' : '' ?> value="F">Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="mb-2 col-6">
                    <label class="form-label" for="dataNascCadastro">Data de Nascimento</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input class="form-control" type="date" name="dataNascCadastro" value="<?=$dados["dataNascCadastro"]?>">
                    </div>
                </div>
            </div>

            <div class="mb-2">
                <input class="btn btn-warning" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
        </form>
    </div>

    <div class="col-5">
        <?php
            if ($dados["nomeFotoCadastro"]=="" || !file_exists('./paginas/cadastros/fotos-cadastros/' . $dados["nomeFotoCadastro"])){
                $nomeFoto = "SemFoto.jpg";
            }else{
                $nomeFoto = $dados["nomeFotoCadastro"];
            }
        ?>
        <div class="mb-3">
            <img id="fotos-cadastros" class="img-thumbnail" width="250" src="./paginas/cadastros/fotos-cadastros/<?=$nomeFoto?>" class="img-fluid rounded" alt="Foto do Cadastro">
        </div>

        <div class="mb-3">
        <button class="btn btn-info" id="btn-editar-foto">
            <i class="bi bi-camera-fill"></i> Editar Foto
        </button>
        </div>

        <div id="editar-foto">
                <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idCadastro" value="<?=$idCadastro?>">
                <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="arquivo" id="arquivo">
                        <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                    </div>

                </form>
                <div id="mensagem" class="mb-3 alert alert-success">
                    
                </div>
                <div id="preloader" class="progress">
                    <div id="barra"
                    class="progress-bar bg-danger" 
                    role="progressbar" 
                    style="width: 0%" 
                    aria-valuenow="0" 
                    aria-valuemin="0" 
                    aria-valuemax="100">0%</div>
                </div>  
    </div>
                
</div>
</div>
