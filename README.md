# PHP MVC Example

Ejemplo de aplicación web PHP utilizando el patrón de arquitectura **MVC (Modelo-Vista-Controlador)** con Docker.

## Tecnologías

- **PHP 8.2** con Apache
- **MySQL 8** con UTF-8
- **PHPMyAdmin** para gestión de base de datos
- **Docker & Docker Compose**

## Instalación y Uso

### Primera vez o cuando modifiques el Dockerfile:

```bash
docker-compose up -d --build
```

### Ejecuciones posteriores:

```bash
docker-compose up -d
```

### Detener el proyecto:

```bash
docker-compose down
```

## Acceso a la Aplicación

- **Aplicación web:** http://localhost:8080
- **PHPMyAdmin:** http://localhost:8081
  - Usuario: `root`
  - Contraseña: `secret`

## ¿Cómo Funciona?

Este proyecto implementa el patrón **MVC (Modelo-Vista-Controlador)**, que separa la lógica de la aplicación en tres componentes principales:

### Arquitectura MVC

```
┌─────────────┐
│   Cliente   │
│  (Browser)  │
└──────┬──────┘
       │
       ▼
┌─────────────────────────────────┐
│  public/index.php (Router)      │
│  - Recibe peticiones            │
│  - Enruta a controladores       │
└────────┬────────────────────────┘
         │
         ▼
┌─────────────────────────────────┐
│  Controller (UserController)    │
│  - Procesa la petición          │
│  - Llama al modelo              │
│  - Carga la vista               │
└────┬────────────────────┬───────┘
     │                    │
     ▼                    ▼
┌─────────────┐    ┌─────────────┐
│   Model     │    │    View     │
│   (User)    │    │ (usuarios)  │
│             │    │             │
│ - Consultas │    │ - HTML/PHP  │
│ - BD Logic  │    │ - Layout    │
└──────┬──────┘    └─────────────┘
       │
       ▼
┌─────────────┐
│   MySQL     │
│  Database   │
└─────────────┘
```

### Flujo de una Petición

1. **El usuario accede** a `http://localhost:8080/?action=index`

2. **Router (`public/index.php`):**
   - Establece conexión con MySQL
   - Lee el parámetro `action` de la URL
   - Crea instancias del Modelo y Controlador
   - Enruta la petición al método correspondiente

3. **Controller (`src/controllers/UserController.php`):**
   - Ejecuta la acción solicitada (ej: `index()`, `show()`, `create()`)
   - Llama al modelo para obtener/modificar datos
   - Carga la vista correspondiente

4. **Model (`src/models/User.php`):**
   - Se comunica con la base de datos MySQL
   - Ejecuta consultas SQL (SELECT, INSERT, DELETE)
   - Retorna los datos al controlador

5. **View (`src/views/users/*.php`):**
   - Recibe los datos del controlador
   - Genera el HTML dinámico
   - Usa layouts para mantener consistencia visual
   - Envía la respuesta al navegador

### Ejemplo Práctico: Listar Usuarios

```php
// 1. URL: http://localhost:8080
// 2. Router: index.php detecta action = 'index' (default)
// 3. Controller: $controller->index()
// 4. Model: $userModel->getAll() consulta SELECT * FROM users
// 5. View: users/index.php muestra tabla con usuarios
```

## Estructura del Proyecto

```
php-example/
│
├── deploy/
│   ├── Dockerfile          # Imagen PHP 8.2 + Apache + PDO
│   ├── init.sql           # Script de inicialización de BD
│   └── my.cnf             # Configuración UTF-8 MySQL
│
├── public/
│   └── index.php          # Punto de entrada (Router)
│
├── src/
│   ├── controllers/
│   │   └── UserController.php   # Lógica de control
│   │
│   ├── models/
│   │   └── User.php             # Lógica de datos
│   │
│   └── views/
│       ├── layouts/
│       │   ├── main.php         # Layout principal
│       │   └── auth.php         # Layout de autenticación
│       │
│       └── users/
│           ├── index.php        # Lista de usuarios
│           ├── show.php         # Detalle de usuario
│           ├── create.php       # Formulario crear
│           └── login.php        # Formulario login
│
└── docker-compose.yml     # Configuración de servicios
```

## Funcionalidades Disponibles

- **Listar usuarios:** `http://localhost:8080`
- **Ver detalle:** `http://localhost:8080?action=show&id=1`
- **Crear usuario:** `http://localhost:8080?action=create`
- **Eliminar usuario:** `http://localhost:8080?action=delete&id=1`
- **Login (demo):** `http://localhost:8080?action=login`

## Base de Datos

La base de datos `demo` se inicializa automáticamente con:

- Tabla `users` (id, name, email, created_at, updated_at)
- 5 usuarios de ejemplo
- Configuración UTF-8 completa
