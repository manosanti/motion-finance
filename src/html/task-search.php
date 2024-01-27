<?php
include 'connection.php';
?>

<div class="container mt-4">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data de Criação</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th class="col-1"></th>
                <th class="col-1"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, cliente, descricao, data_criacao FROM tasks";
            $result = $connect->query($sql);

            // Armazenar os resultados em uma Array
            $rows = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row; // Adiciona cada linha à array
                }

                // Inverte a ordem da array
                $invertedArray = array_reverse($rows);

                // Itera sobre a array invertida
                foreach ($invertedArray as $row) {
                    echo "<tr>";
                    // Formata a data para o padrão brasileiro
                    $dataFormatada = date('d/m/Y', strtotime($row['data_criacao']));
                    echo "<td>" . $dataFormatada . "</td>";
                    echo "<td>" . $row["cliente"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td><button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal" . $row["id"] . "'>Editar</button></td>";
                    echo "<td><a href='task-remove.php?id=" . $row["id"] . "' class='btn btn-danger'>Excluir</a></td>";
                    echo "</tr>";

                    // Modal de Edição
                    echo "<div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
                    // Resto do código do modal...
                }
            } else {
                echo "<tr><td colspan='4'>0 resultados encontrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
