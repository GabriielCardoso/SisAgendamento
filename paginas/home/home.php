<h3><i class="bi bi-house"></i> Home</h3>

<style>
    /* Estilos para tabela e botões */
    table {
        width: 100%;
        max-width: 600px;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        background-color: transparent;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }
    th {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        text-align: center;
        font-size: 1.2em;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    td {
        width: 14.28%;
        height: 100px;
        text-align: center;
        vertical-align: top;
        padding: 10px;
        font-size: 1.2em;
        border: 1px solid #ddd;
        position: relative;
        color: #333;
        background-color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    td:hover {
        background-color: #f1f1f1;
    }
    .day {
        font-size: 1.4em;
        font-weight: bold;
        color: #333;
    }
    .day:hover {
        background-color: #4CAF50;
        color: white;
        border-radius: 50%;
        padding: 10px;
    }
    .evento {
        font-size: 0.9em;
        color: #555;
        margin-top: 5px;
        display: block;
        background-color: #f9f9f9;
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 5px;
    }
    .hora {
        font-size: 0.8em;
        color: #777;
        display: block;
        margin-bottom: 10px;
    }
    .evento-indicator {
        height: 4px;
        background-color: #4CAF50;
        position: absolute;
        bottom: 5px;
        left: 0;
        right: 0;
        display: none;
        border-radius: 2px;
    }
    .has-event .evento-indicator {
        display: block;
    }
    .action-btn {
        background-color: transparent;
        color: #4CAF50;
        border: 1px solid #4CAF50;
        padding: 5px 8px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9em;
        margin: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .action-btn:hover {
        background-color: #4CAF50;
        color: white;
    }
    .form-container, .event-details {
        display: none;
        margin-top: 10px;
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 5px;
    }
    .form-container input[type="text"],
    .form-container input[type="time"] {
        width: 90%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .form-container button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .form-container button:hover {
        background-color: #45a049;
    }
</style>

<script>
    function toggleForm(id) {
        var form = document.getElementById(id);
        form.style.display = form.style.display === "none" ? "block" : "none";
    }

    function toggleEventDetails(id) {
        var details = document.getElementById(id);
        details.style.display = details.style.display === "none" ? "block" : "none";
    }
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dbsisagendamento";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

setlocale(LC_TIME, 'pt_BR.UTF-8', 'pt_BR', 'portuguese');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nomeEvento']) && isset($_POST['dataEvento']) && isset($_POST['horaEvento'])) {
    $nomeEvento = $_POST['nomeEvento'];
    $dataEvento = $_POST['dataEvento'];
    $horaEvento = $_POST['horaEvento'];

    $sql = "INSERT INTO eventos (dataEvento, nomeEvento, horaEvento) VALUES ('$dataEvento', '$nomeEvento', '$horaEvento')";
    $conn->query($sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['concluirEvento']) && isset($_POST['idEvento'])) {
    $idEvento = $_POST['idEvento'];
    $sql = "DELETE FROM eventos WHERE idEvento = $idEvento";
    if ($conn->query($sql) === TRUE) {
        echo "Evento excluído com sucesso!";
    } else {
        echo "Erro ao excluir evento: " . $conn->error;
    }
}

$sql = "SELECT idEvento, dataEvento, nomeEvento, horaEvento FROM eventos";
$result = $conn->query($sql);
$eventos = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eventos[$row['dataEvento']][] = array(
            'idEvento' => $row['idEvento'], 
            'nomeEvento' => $row['nomeEvento'], 
            'horaEvento' => $row['horaEvento']
        );
    }
}

$mes = date('m');
$ano = date('Y');
$primeiroDia = mktime(0, 0, 0, $mes, 1, $ano);
$nomeMes = ucfirst(strftime('%B', $primeiroDia));
$diasNoMes = date('t', $primeiroDia);
$diaSemana = date('w', $primeiroDia);
$diasDaSemana = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb');

echo "<h1>$nomeMes $ano</h1>";
echo "<table>";
echo "<tr>";
foreach ($diasDaSemana as $dia) {
    echo "<th>$dia</th>";
}
echo "</tr><tr>";

if ($diaSemana > 0) {
    for ($i = 0; $i < $diaSemana; $i++) {
        echo "<td class='empty'></td>";
    }
}

for ($dia = 1; $dia <= $diasNoMes; $dia++) {
    $dataAtual = "$ano-$mes-" . str_pad($dia, 2, '0', STR_PAD_LEFT);

    if (($dia + $diaSemana - 1) % 7 == 0 && $dia != 1) {
        echo "</tr><tr>";
    }

    $hasEvent = isset($eventos[$dataAtual]) ? 'has-event' : '';
    echo "<td class='$hasEvent' onclick='toggleEventDetails(\"event-details-$dia\")'><span class='day'>$dia</span>";

    if (isset($eventos[$dataAtual])) {
        echo "<div class='evento-indicator'></div>";
        echo "<div class='event-details' id='event-details-$dia'>";
        foreach ($eventos[$dataAtual] as $evento) {
            echo "<div class='evento'>" . $evento['nomeEvento'] . "</div>";
            echo "<div class='hora'>" . $evento['horaEvento'] . "</div>";
            echo "<form method='POST' action=''>
                    <input type='hidden' name='idEvento' value='" . $evento['idEvento'] . "'>
                    <button class='action-btn' type='submit' name='concluirEvento'>Concluir</button>
                  </form>";
        }
        echo "</div>";
    }

    $formId = "form-$dia";
    echo "<button class='action-btn' onclick='toggleForm(\"$formId\")'>Adicionar Evento</button>";
    echo "<div class='form-container' id='$formId'>
            <form method='POST' action=''>
                <input type='hidden' name='dataEvento' value='$dataAtual'>
                <input type='text' name='nomeEvento' placeholder='Nome do Evento' required>
                <input type='time' name='horaEvento' required>
                <button type='submit'>Salvar</button>
            </form>
          </div>";

    echo "</td>";
}

while (($dia + $diaSemana - 1) % 7 != 0) {
    echo "<td class='empty'></td>";
    $dia++;
}

echo "</tr>";
echo "</table>";

$conn->close();
?>