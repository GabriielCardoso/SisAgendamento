<?php

$txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";

// Alterna entre status concluído ou não concluído 
$idAgendamento = (isset($_GET['idAgendamento'])) ? $_GET['idAgendamento'] : "";
$statusAgendamento = (isset($_GET['statusAgendamento']) && $_GET['statusAgendamento'] == '0') ? '1' : '0';

// Verifica se idAgendamento não está vazio antes de executar a atualização
if (!empty($idAgendamento)) {
    // Prepara a consulta para atualização
    $stmt = $conexão->prepare("UPDATE tbagendamento SET statusAgendamento = ? WHERE idAgendamento = ?");
    
    // Bind dos parâmetros
    $stmt->bind_param("ii", $statusAgendamento, $idAgendamento);
    
    // Executa a consulta
    if ($stmt->execute()) {
        // Atualização realizada com sucesso
    } else {
        die("Erro ao atualizar: " . $stmt->error);
    }

    // Fecha a declaração
    $stmt->close();
} else {
    echo "";
}

?>

<header>
    <h3><i class="bi bi-list-task"></i> Agendamentos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2" href="?menuop=cad-agendamento"><i class="bi bi-list-task"></i> Novo Agendamento</a>
</div>
<div>
    <form action="index.php?menuop=agendamentos" method="post">
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
                <th>Status</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Descrição</th>
                <th>Data Ag.</th>
                <th>Hora</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $quantidade = 10;
            $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $inicio = ($quantidade * $pagina) - $quantidade;

            $sql = "SELECT
                idAgendamento,
                statusAgendamento,
                nomeAgendamento,
                CPFAgendamento,
                descriçãoAgendamento,
                DATE_FORMAT(dataAgendamento, '%d/%m/%Y') AS dataAgendamento,
                horaAgendamento
            FROM tbagendamento
            WHERE 
                nomeAgendamento LIKE ? OR
                CPFAgendamento LIKE ?
            ORDER BY statusAgendamento, dataAgendamento
            LIMIT ?, ?";
            
            // Prepara a consulta para seleção
            $stmt = $conexão->prepare($sql);
            $likePesquisa = "%{$txt_pesquisa}%";
            $stmt->bind_param("ssii", $likePesquisa, $likePesquisa, $inicio, $quantidade);
            $stmt->execute();
            $rs = $stmt->get_result();
            
            while ($dados = $rs->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="index.php?menuop=agendamentos&pagina=<?=$pagina?>&idAgendamento=<?=$dados['idAgendamento']?>&statusAgendamento=<?=$dados['statusAgendamento']?>">
                            <?php
                            if ($dados['statusAgendamento'] == 0) {
                                echo '<i class="bi bi-square"></i>';
                            } else {
                                echo '<i class="bi bi-check-square"></i>';
                            }
                            ?>
                        </a>
                    </td>
                    <td class="text-nowrap"><?=$dados['nomeAgendamento']?></td>
                    <td class="text-nowrap"><?=$dados['CPFAgendamento']?></td>
                    <td class="text-nowrap"><?=$dados['descriçãoAgendamento']?></td>
                    <td class="text-nowrap"><?=$dados['dataAgendamento']?></td>
                    <td class="text-nowrap"><?=$dados['horaAgendamento']?></td>
                    <td class="text-center">
                        <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-agendamento&idAgendamento=<?=$dados['idAgendamento']?>"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-agendamento&idAgendamento=<?=$dados['idAgendamento']?>"><i class="bi bi-trash-fill"></i></a>    
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
    $sqlTotal = "SELECT idAgendamento FROM tbagendamento";
    $qrTotal = mysqli_query($conexão, $sqlTotal) or die(mysqli_error($conexão));
    $numTotal = mysqli_num_rows($qrTotal);

    $totalPagina = ceil($numTotal / $quantidade);

    echo "<li class='page-item'><span class='page-link'>Total de registros: " . $numTotal . " </span></li> ";

    echo '<li class="page-item"><a class="page-link" href="?menuop=agendamentos&pagina=1">Primeira Pagina</a></li>';

    if ($pagina > 6) {
        ?>
        <li class="page-item"><a class="page-link" href="?menuop=agendamentos&pagina=<?php echo $pagina - 1 ?>"><<</a></li>
        <?php
    }

    for ($i = 1; $i <= $totalPagina; $i++) {
        if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
            if ($i == $pagina) {
                echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href=\"?menuop=agendamentos&pagina={$i}\"> {$i} </a></li>";
            }
        }
    }

    if ($pagina < $totalPagina - 5) {
        ?>
        <li class="page-item"><a class="page-link" href="?menuop=agendamentos&pagina=<?php echo $pagina + 1 ?>">>></a></li>
        <?php
    }
    echo "<li class='page-item'> <a class='page-link' href=\"?menuop=agendamentos&pagina=$totalPagina\">Ultima Pagina</a></li>";
    ?>
</ul>