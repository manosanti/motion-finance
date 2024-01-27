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

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
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
                    echo "<div class='modal-dialog'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo "<h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Task</h1>";
                    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    // Formulário de edição
                    echo "<form action='task-edit.php' method='post'>";
                    echo "<input type='hidden' name='task_id' value='" . $row["id"] . "'>";
                    echo "<div class='col form-floating mb-3'>";
                    echo "<input type='text' class='form-control' id='cliente' name='cliente' value='" . $row["cliente"] . "' required>";
                    echo "<label for='cliente'>Título Tarefa <span class='text-danger-emphasis'>*</span></label>";
                    echo "</div>";
                    echo "<div class='col form-floating mb-3'>";
                    echo "<input type='text' class='form-control' id='descricao' name='descricao' value='" . $row["descricao"] . "' required>";
                    echo "<label for='descricao'>Descrição Tarefa <span class='text-danger-emphasis'>*</span></label>";
                    echo "</div>";
                    echo "<button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Fechar</button>";
                    echo "<button type='submit' class='btn btn-success float-right'>Salvar Alterações</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<tr><td colspan='4'>0 resultados encontrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>