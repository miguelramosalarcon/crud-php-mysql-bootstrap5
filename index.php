<?php
require_once 'functions.php';
$usuarios = obtenerUsuarios($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>CRUD de Usuarios</h1>

    <!-- Botón para abrir el modal de nuevo usuario -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">Nuevo Usuario</button>

    <!-- Tabla de usuarios -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Distrito</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= htmlspecialchars($usuario['nombres']) ?></td>
                    <td><?= htmlspecialchars($usuario['appaterno']) ?></td>
                    <td><?= htmlspecialchars($usuario['apmaterno']) ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= htmlspecialchars($usuario['distrito']) ?></td>
                    <td>
                        <!-- Botón para editar -->
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal<?= $usuario['id'] ?>">Editar</button>

                        <!-- Botón para eliminar -->
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal<?= $usuario['id'] ?>">Eliminar</button>
                    </td>
                </tr>
                <!-- Modal Editar -->
                <div class="modal fade" id="editarModal<?= $usuario['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="update.php" method="post">
                                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nombres</label>
                                        <input type="text" name="nombres" class="form-control" value="<?= htmlspecialchars($usuario['nombres']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Apellido Paterno</label>
                                        <input type="text" name="appaterno" class="form-control" value="<?= htmlspecialchars($usuario['appaterno']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Apellido Materno</label>
                                        <input type="text" name="apmaterno" class="form-control" value="<?= htmlspecialchars($usuario['apmaterno']) ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?= $usuario['email'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Distrito</label>
                                        <input type="text" name="distrito" class="form-control" value="<?= htmlspecialchars($usuario['distrito']) ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Eliminar -->
                <div class="modal fade" id="eliminarModal<?= $usuario['id'] ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                                <div class="modal-header">
                                    <h5 class="modal-title">Eliminar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Está seguro que desea eliminar este usuario <strong> <?php echo $usuario['nombres']." ".$usuario["appaterno"]?>?</strong></p> 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Nuevo Usuario -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="insert.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text" name="nombres" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Paterno</label>
                        <input type="text" name="appaterno" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Materno</label>
                        <input type="text" name="apmaterno" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Distrito</label>
                        <input type="text" name="distrito" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>