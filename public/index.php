<?php
require_once __DIR__ . '/../src/models/User.php';
require_once __DIR__ . '/../src/controllers/UserController.php';

// Conexión BD
try {
    $db = new PDO('mysql:host=db;dbname=demo;charset=utf8mb4', 'root', 'secret');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES utf8mb4");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Router básico
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

$userModel = new User($db);
$controller = new UserController($userModel);

match($action) {
    'show' => $controller->show($id),
    'login' => $controller->login(),
    'create' => $controller->create(),
    'store' => $controller->store(),
    'delete' => $controller->delete($id),
    default => $controller->index()
};