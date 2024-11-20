<?php
    require_once 'functions.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        eliminarUsuario($pdo, $id);
        header("Location: index.php");
        exit();
    }
?>
