<?php
    require_once 'functions.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombres = $_POST['nombres'];
        $apaterno = $_POST['appaterno'];
        $amaterno = $_POST['apmaterno'];
        $email = $_POST['email'];
        $distrito = $_POST['distrito'];

        insertarUsuario($pdo, $nombres, $apaterno, $amaterno, $email, $distrito);
        header("Location: index.php");
        exit();
    }
?>
