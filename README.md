# Z-CAMISETA

**Tienda Virtual de Camisetas**  
Proyecto web desarrollado en [Laravel](https://laravel.com/) + [Filament](https://filamentphp.com/) v3, con entorno de desarrollo listo para Docker y MySQL.

---

## 🚀 Características principales

- Gestión de productos (camisetas): tallas, colores, estilos, stock, imagen, estado
- Gestión de pedidos y clientes
- Administración rápida y segura con Filament Admin Panel
- Login y registro de usuarios
- Imágenes gestionadas con almacenamiento público
- Configuración lista para trabajar con Docker

---

## 🛠️ Tecnologías usadas

- **PHP 8.3**
- **Laravel 10+**
- **Filament v3**
- **MySQL 8**
- **Docker & Docker Compose**

---

## 📦 Instalación rápida (desarrollo local con Docker)

1. Clona el repositorio:

    ```bash
    git clone https://github.com/dariosjil13/Z-CAMISETA.git
    cd Z-CAMISETA
    ```

2. Copia el archivo de entorno:

    ```bash
    cp .env.example .env
    ```

3. Levanta los servicios Docker:

    ```bash
    docker-compose up -d --build
    ```

4. Ingresa al contenedor de la app y termina la configuración:

    ```bash
    docker exec -it camisetas-app bash
    composer install
    php artisan key:generate
    php artisan migrate
    php artisan storage:link
    ```

5. Accede desde tu navegador:
    - [http://localhost:8000](http://localhost:8000)
    - [http://localhost:8000/admin](http://localhost:8000/admin) _(Panel de administración Filament)_
    - User: <test@example.com>
    - Password: password

---

## ⚡ Comandos útiles

- Parar y eliminar los servicios:

    ```bash
    docker-compose down
    ```

- Ver logs:

    ```bash
    docker logs camisetas-app
    ```

---

## 👨‍💻 Autores y colaboradores

- **Oliver Aguilar**
- **Maribel Arteaga**
- **Juan Diego Escobar**
- **Daniel Ospina**
- **Yoseth Rivera**

---

## 📄 Licencia

Este proyecto se distribuye bajo la licencia MIT.

---
