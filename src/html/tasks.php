<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php
        include 'menu.php';
        ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php
            include 'header.php';
            ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="card-title fw-semibold mb-4">Criar Tarefa</h5>
                                </div>
                            </div>
                            <form action="form_validation.php" method="POST">
                                <div class="col form-floating mb-3">
                                    <input type="text" class="form-control" id="cliente" name="cliente" placeholder="nova tarefa" required>
                                    <label for="cliente">Título Tarefa <span class="text-danger-emphasis">*</span></label>
                                </div>
                                <div class="col form-floating mb-3">
                                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="nova tarefa" required>
                                    <label for="descricao">Descrição Tarefa <span class="text-danger-emphasis">*</span></label>
                                </div>
                                <button type="submit" class="btn btn-success mx-auto d-block fs-4 fw-semibold">Criar Tarefa</button>
                            </form>
                        </div>
                    </div>
                    <dic class="card">
                        <div class="card-body">
                            <div class="row">
                            <h5 class="card-title fw-semibold fs-4">Tarefas</h5>
                            <?php
                            include 'task-search.php';
                            ?>
                            </div>
                        </div>
                    </dic>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>