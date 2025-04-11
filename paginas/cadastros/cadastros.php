<?php
 $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";
?>


<header>
    <h3><i class="bi bi-person-square"></i> Cadastros</h3>
</header>
<div>
<a class="btn btn-outline-secondary mb-2" href="index.php?menuop=novo-cad"><i class="bi bi-person-fill-add"></i> Novo Cadastro</a>
</div>
<div>
    <form action="index.php?menuop=cadastros" method="post">
        <div class="input-group">
        <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
        <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
        
    </form>
</div>

<div class="tabela">
<table class="table table-dark table-striped table-bordered table-sm">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data Nasc.</th>
            <th>Edição</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
    <?php

    $quantidade = 8;

    $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

    $inicio = ($quantidade * $pagina) - $quantidade;

    

    $sql = "SELECT
idCadastro,
upper(nomeCadastro) AS nomeCadastro,
CPFCadastro,
lower(emailCadastro) AS emailCadastro,
telefoneCadastro,
upper(enderecoCadastro) AS enderecoCadastro,
CASE
	WHEN sexoCadastro='F' THEN 'FEMININO'
    WHEN sexoCadastro='M' THEN 'MASCULINO'
ELSE
	'NÃO ESPECIFICADO'
END AS sexoCadastro,
DATE_FORMAT(dataNascCadastro,'%d/%m/%Y') AS dataNascCadastro
FROM tbcadastros 
WHERE 
idCadastro='{$txt_pesquisa}' or
nomeCadastro LIKE '%{$txt_pesquisa}%' 
ORDER BY nomeCadastro ASC
LIMIT $inicio ,  $quantidade
";
    $rs = mysqli_query($conexão,$sql) or die ("Erro ao executar a consulta" . mysql_error($conexão));
    while($dados = mysqli_fetch_assoc($rs) ) {

    
    ?>
    <tr>
        <td><?=$dados["idCadastro"] ?></td>
        <td class="text-nowrap"><?=$dados["nomeCadastro"] ?></td>
        <td class="text-nowrap"><?=$dados["CPFCadastro"] ?></td>
        <td class="text-nowrap"><?=$dados["emailCadastro"] ?></td>
        <td class="text-nowrap"><?=$dados["telefoneCadastro"] ?></td>
        <td class="text-nowrap"><?=$dados["enderecoCadastro"] ?></td>
        <td><?=$dados["sexoCadastro"] ?></td>
        <td><?=$dados["dataNascCadastro"] ?></td>

        <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-cadastro&idCadastro=<?=$dados["idCadastro"] ?>"><i class="bi bi-pencil-square"></i></a></td>
        <td class="text-center"><a class="btn btn-outline-danger btn-sm-outline" href="index.php?menuop=excluir-cadastro&idCadastro=<?=$dados["idCadastro"] ?>"><i class="bi bi-trash-fill"></i></a></td>

    </tr>
<?php
    }
    ?>


    </tbody> 
</table>
</div>

<ul class="pagination justify-content-center">
<?php

$sqlTotal = "SELECT idCadastro FROM tbcadastros";
$qrTotal = mysqli_query($conexão,$sqlTotal) or die (mysqli_error($conexão));
$numTotal = mysqli_num_rows($qrTotal);
$totalPagina = ceil($numTotal/$quantidade);

echo " <li class='page-item'><span class='page-link'> Total de cadastros: " . $numTotal . "</span></li>";

echo '<li class="page-item"><a class="page-link" href="?menuop=cadastros&pagina=1">Primeira Página</a><li>';

if($pagina>6){
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=cadastros&pagina=<?php echo $pagina-1?>"><<< </a></li>
    <?php
}

for ($i = 1; $i <= $totalPagina; $i++) {

    if ($i>=($pagina-5) && $i <= ($pagina+5)){
        if ($i == $pagina) {
            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
        } else {
            echo "<li class='page-item'><a class='page-link' href=\"?menuop=cadastros&pagina=$i\">$i</a></li> ";
        }
    }
}

if($pagina< ($totalPagina-5)){
    ?>
        <li class="page-item"><a class="page-link" href="?menuop=cadastros&pagina=<?php echo $pagina+1?>">>>> </a></li>
    <?php
}

echo "<li class='page-item'><a class='page-link' href=\"?menuop=cadastros&pagina=$totalPagina\">Última Página</a></li>";

?>
</ul>