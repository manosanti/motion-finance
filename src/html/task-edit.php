<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os dados do formulário foram recebidos
    if (isset($_POST['task_id'], $_POST['cliente'], $_POST['descricao'])) {
        $task_id = $_POST['task_id'];
        $cliente = $_POST['cliente'];
        $descricao = $_POST['descricao'];

        // Atualiza a task no banco de dados
        $sql = "UPDATE tasks SET cliente = ?, descricao = ? WHERE id = ?";
        $stmt = $connect->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssi", $cliente, $descricao, $task_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Atualização bem-sucedida
                header("Location: tasks.php"); // Redireciona para a página inicial ou a página desejada após a edição
                exit();
            } else {
                // Nenhuma linha afetada (nenhuma alteração)
                echo "Nenhuma alteração realizada.";
            }

            $stmt->close();
        } else {
            echo "Erro na preparação da declaração SQL.";
        }
    } else {
        echo "Parâmetros do formulário ausentes.";
    }
} else {
    echo "Método de requisição inválido.";
}