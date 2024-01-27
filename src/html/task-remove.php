<?php include 'connection.php'; ?>

<?php 

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM tasks WHERE id = $id";

        $result = mysqli_query($connect, $sql);

        if(!$result){
            die("Falha ao deletar");
        }

        else {
            header("Location: tasks.php?delete=success");
        }
    }

?>