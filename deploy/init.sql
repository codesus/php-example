-- Script de inicialización de la base de datos
-- Se ejecuta automáticamente al crear el contenedor

SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

USE demo;

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertar datos de ejemplo
INSERT INTO users (name, email) VALUES
    ('Juan Pérez', 'juan@ejemplo.com'),
    ('María García', 'maria@ejemplo.com'),
    ('Carlos López', 'carlos@ejemplo.com'),
    ('Ana Martínez', 'ana@ejemplo.com'),
    ('Pedro Sánchez', 'pedro@ejemplo.com');

-- Verificar
SELECT 'Base de datos inicializada correctamente' AS status;
