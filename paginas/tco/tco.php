<?php

// Verifique se a conexão está estabelecida corretamente
if (!$conexão) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$txt_pesquisa = isset($_POST["txt_pesquisa"]) ? $_POST["txt_pesquisa"] : "";

// Alterna entre status concluído ou não concluído 
$idTco = isset($_GET['idTco']) ? $_GET['idTco'] : "";
$statusTco = (isset($_GET['statusTco']) && $_GET['statusTco'] == '0') ? '1' : '0';

// Verifica se idTco não está vazio antes de executar a atualização
if (!empty($idTco)) {
    $stmt = $conexão->prepare("UPDATE tbtco SET statusTco = ? WHERE idTco = ?");
    
    if ($stmt === false) {
        die("Erro ao preparar a consulta de atualização: " . $conexão->error);
    }

    $stmt->bind_param("ii", $statusTco, $idTco);
    
    if (!$stmt->execute()) {
        die("Erro ao atualizar: " . $stmt->error);
    }

    $stmt->close();
}

?>

<header>
    <h3><i class="bi bi-paperclip"></i> TCO</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2" href="?menuop=cad-tco"><i class="bi bi-paperclip"></i> Novo Tco</a>
</div>
<div>
    <form action="index.php?menuop=tco" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?= htmlspecialchars($txt_pesquisa) ?>">
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>
<div class="tabela">
    <table class="table table-dark table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Status</th>
                <th>Autor</th>
                <th>Vitima</th>
                <th>TCO</th>
                <th>BCO</th>
                <th>Data Tco</th>
                <th>Hora Tco</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quantidade = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $inicio = ($quantidade * $pagina) - $quantidade;

            $sql = "SELECT
                idTco,
                statusTco,
                AutorTco,
                VitimaTco,
                Tco,
                Bco,
                DATE_FORMAT(dataTco, '%d/%m/%Y') AS dataTco,
                horaTco
            FROM tbtco
            WHERE 
                AutorTco LIKE ? OR
                VitimaTco LIKE ?
            ORDER BY statusTco, dataTco
            LIMIT ?, ?";
            
            $stmt = $conexão->prepare($sql);
            if ($stmt === false) {
                die("Erro ao preparar a consulta de seleção: " . $conexão->error);
            }

            $likePesquisa = "%{$txt_pesquisa}%";
            $stmt->bind_param("ssii", $likePesquisa, $likePesquisa, $inicio, $quantidade);
            $stmt->execute();
            $rs = $stmt->get_result();
            
            while ($dados = $rs->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="index.php?menuop=tco&pagina=<?= $pagina ?>&idTco=<?= $dados['idTco'] ?>&statusTco=<?= $dados['statusTco'] ?>">
                            <?php
                            if ($dados['statusTco'] == 0) {
                                echo '<i class="bi bi-square"></i>';
                            } else {
                                echo '<i class="bi bi-check-square"></i>';
                            }
                            ?>
                        </a>
                    </td>
                    <td class="text-nowrap"><?= isset($dados['AutorTco']) ? $dados['AutorTco'] : 'N/A' ?></td>
                    <td class="text-nowrap"><?= isset($dados['VitimaTco']) ? $dados['VitimaTco'] : 'N/A' ?></td>
                    <td class="text-nowrap"><?= isset($dados['Tco']) ? $dados['Tco'] : 'N/A' ?></td>
                    <td class="text-nowrap"><?= isset($dados['Bco']) ? $dados['Bco'] : 'N/A' ?></td>
                    <td class="text-nowrap"><?= isset($dados['dataTco']) ? $dados['dataTco'] : 'N/A' ?></td>
                    <td class="text-nowrap"><?= isset($dados['horaTco']) ? $dados['horaTco'] : 'N/A' ?></td>
                    <td class="text-center">
                        <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-tco&idTco=<?= $dados['idTco'] ?>"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-tco&idTco=<?= $dados['idTco'] ?>"><i class="bi bi-trash-fill"></i></a>    
                    </td>
                </tr>
            <?php
            }
            $stmt->close();
            ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">
    <?php
    $sqlTotal = "SELECT COUNT(idTco) AS total FROM tbtco";
    $qrTotal = mysqli_query($conexão, $sqlTotal);
    
    if ($qrTotal && $resultTotal = mysqli_fetch_assoc($qrTotal)) {
        $numTotal = $resultTotal['total'];
        $totalPagina = ceil($numTotal / $quantidade);

        echo "<li class='page-item'><span class='page-link'>Total de registros: $numTotal </span></li> ";
        echo '<li class="page-item"><a class="page-link" href="?menuop=tco&pagina=1">Primeira Página</a></li>';

        if ($pagina > 6) {
            echo '<li class="page-item"><a class="page-link" href="?menuop=tco&pagina=' . ($pagina - 1) . '"><<</a></li>';
        }

        for ($i = 1; $i <= $totalPagina; $i++) {
            if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                if ($i == $pagina) {
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href=\"?menuop=tco&pagina=$i\"> $i </a></li>";
                }
            }
        }

        if ($pagina < $totalPagina - 5) {
            echo '<li class="page-item"><a class="page-link" href="?menuop=tco&pagina=' . ($pagina + 1) . '">>></a></li>';
        }
        echo "<li class='page-item'><a class='page-link' href=\"?menuop=tco&pagina=$totalPagina\">Última Página</a></li>";
    } else {
        echo "Erro ao obter o total de registros.";
    }
    ?>
</ul>

