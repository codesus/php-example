<?php
$title = 'Lista de Usuarios';
ob_start();
?>

<h1>Usuarios</h1>

<a href="index.php?action=create" class="btn">+ Nuevo Usuario</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
                <a href="index.php?action=show&id=<?= $user['id'] ?>">Ver detalles</a> |
                <a
                    href="index.php?action=delete&id=<?= $user['id'] ?>"
                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')"
                    style="color: #dc3545;"
                >
                    Eliminar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
?>