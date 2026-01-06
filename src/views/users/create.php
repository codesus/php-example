<?php
$title = 'Crear Usuario';
ob_start();
?>

<h1>Crear Nuevo Usuario</h1>

<form action="index.php?action=store" method="POST" style="max-width: 500px;">
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Nombre:</label>
        <input
            type="text"
            id="name"
            name="name"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
        >
    </div>

    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            required
            style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"
        >
    </div>

    <div style="display: flex; gap: 10px;">
        <button
            type="submit"
            style="padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;"
        >
            Crear Usuario
        </button>
        <a
            href="index.php"
            style="padding: 10px 20px; background: #6c757d; color: white; border-radius: 4px; text-decoration: none; display: inline-block;"
        >
            Cancelar
        </a>
    </div>
</form>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
?>
