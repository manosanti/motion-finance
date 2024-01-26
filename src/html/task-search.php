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
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT id, cliente, descricao, data_criacao FROM tasks";
            $result = $connect->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // Formata a data para o padrão brasileiro
                    $dataFormatada = date('d/m/Y', strtotime($row['data_criacao']));
                    echo "<td>" . $dataFormatada . "</td>";
                    
                    echo "<td>" . $row["cliente"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 resultados encontrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>