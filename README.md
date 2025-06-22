# Z-CAMISETA

**Tienda Virtual de Camisetas**  
Proyecto web desarrollado en [Laravel](https://laravel.com/) + [Filament](https://filamentphp.com/) v3, con entorno de desarrollo listo para Docker y MySQL.

---

🚀 Características principales

    Gestión de productos (camisetas): tallas, colores, estilos, stock, imagen, estado.

    Gestión de pedidos y clientes.

    Administración rápida y segura con Filament Admin Panel.

    Login y registro de usuarios.

    Imágenes gestionadas con almacenamiento público y sincronización para desarrollo.

    Configuración lista para trabajar con Docker.

🛠️ Tecnologías usadas

    PHP 8.3

    Laravel 10+

    Filament v3

    PostgreSQL 15+

    Docker & Docker Compose

📦 Instalación rápida (desarrollo local con Docker)

    Clona el repositorio:

git clone <https://github.com/dariosjil13/Z-CAMISETA.git>
cd Z-CAMISETA

Copia el archivo de entorno:

cp .env.example .env

Levanta los servicios Docker:

docker-compose up -d --build

Ingresa al contenedor de la app y termina la configuración:

docker exec -it laravel-app bash
composer install
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

Sincroniza las imágenes públicas (para pruebas locales):

    Importante:
    Las imágenes cargadas por los usuarios/admins NO se guardan en Git (por defecto, storage/app/public está en .gitignore).

    Para que todos puedan ver las mismas imágenes de prueba, hay una carpeta compartida llamada resources/demo_images/.
    Después de clonar el repo, copia el contenido así:

        cp -r resources/demo_images/* storage/app/public/

        Si te pide sobreescribir archivos, acepta.

        Si subes nuevas imágenes de prueba, recuerda agregar el archivo a resources/demo_images/ y haz commit para compartirlo.

    Accede desde tu navegador:

        http://localhost:8000

        http://localhost:8000/admin (Panel de administración Filament)

        User: admin@example.com

        Password: password

⚡ Comandos útiles

    Parar y eliminar los servicios:

docker-compose down

Ver logs:

    docker logs laravel-app

👨‍💻 Autores y colaboradores

    Oliver Aguilar

    Maribel Arteaga

    Juan Diego Escobar

    Daniel Ospina

    Yoseth Rivera

📄 Licencia

Este proyecto se distribuye bajo la licencia MIT.
