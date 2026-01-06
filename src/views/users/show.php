<?php
$title = 'Detalle de Usuario';
ob_start();
?>

<h1>Detalle del Usuario</h1>

<?php if ($user): ?>
    <table>
        <tr>
            <th>Campo</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td><strong>ID</strong></td>
            <td><?= htmlspecialchars($user['id']) ?></td>
        </tr>
        <tr>
            <td><strong>Nombre</strong></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <tr>
            <td><strong>Creado</strong></td>
            <td><?= htmlspecialchars($user['created_at']) ?></td>
        </tr>
        <tr>
            <td><strong>Actualizado</strong></td>
            <td><?= htmlspecialchars($user['updated_at']) ?></td>
        </tr>
    </table>

    <a href="index.php" class="btn">← Volver a la lista</a>
<?php else: ?>
    <p>Usuario no encontrado</p>
    <a href="index.php" class="btn">← Volver a la lista</a>
<?php endif; ?>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
?>
