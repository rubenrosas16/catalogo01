Proyecto Catalogo por Rubén Antonio Rosas Herrera, 4-2, FIC

Creado con el framework de php Laravel 6.0.4


Requisitos:
-Se requiere composer instalado (https://getcomposer.org/download):
-Se requiere un servidor apache (usa este: https://www.apachefriends.org/es/index.html)
-Se requiere un gestor de base de datos (recomiendo mysql, usa este: https://www.apachefriends.org/es/index.html)

Instrucciones:
-Clonar el repositorio
-Acceder a la carpeta descargada "catalogo01" editar el archivo ".env"
y modificar los datos de conexión de la base de datos que usarás
-Colocar la carpeta "catalogo" en el servidor apache (htdocs)
-Acceder a la carpeta descargada desde CMD con el comando CD rutaCarpeta
-Correr el siguiente comando: "composer update" para generar la carpeta "vendor" de Laravel (si ya existe omite este paso)
-Correr el siguiente comando: "php artisan migrate" para generar la base de datos

- Navegar a través de la url: "http://localhost/catalogo/public", no olvidar el public, ya que eso es cosa de laravel por defecto
