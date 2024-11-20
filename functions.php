<?php

require_once 'db.php';

// Obtener todos los usuarios
function obtenerUsuarios($pdo) {
    $stmt = $pdo->query("SELECT * FROM tbusuario");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Insertar usuario
function insertarUsuario($pdo, $nombres, $apaterno, $amaterno, $email, $distrito) {
    $stmt = $pdo->prepare("INSERT INTO tbusuario (nombres, appaterno, apmaterno, email, distrito) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nombres, $apaterno, $amaterno, $email, $distrito]);
}

// Obtener usuario por ID
function obtenerUsuarioPorId($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM tbusuario WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Actualizar usuario
function actualizarUsuario($pdo, $id, $nombres, $apaterno, $amaterno, $email, $distrito) {
    $stmt = $pdo->prepare("UPDATE tbusuario SET nombres = ?, appaterno = ?, apmaterno = ?, email = ?, distrito = ? WHERE id = ?");
    $stmt->execute([$nombres, $apaterno, $amaterno, $email, $distrito, $id]);
}

// Eliminar usuario
function eliminarUsuario($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM tbusuario WHERE id = ?");
    $stmt->execute([$id]);
}
?>
