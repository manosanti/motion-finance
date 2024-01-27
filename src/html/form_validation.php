<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST["cliente"];
    $descricao = $_POST["descricao"];

    // O campo 'data_criacao' pode ser preenchido automaticamente com a data e hora atuais
    $sql = "INSERT INTO tasks (cliente, descricao, data_criacao) VALUES ('$cliente', '$descricao', CURRENT_TIMESTAMP)";

    if ($connect->query($sql) === TRUE) {
        header("Location: tasks.php?task=success");
    } else {
        echo "Erro ao criar registro: " . $connect->error;
    }

    $connect->close();
}
?>