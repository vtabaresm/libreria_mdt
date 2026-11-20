# Librería MDT

Repositorio del proyecto **"Librería MDT"** para el libro **_Desarrollo Web Paso a Paso_** cuyo autor es Valentina Tabares Morales.

Este repositorio corresponde a proyecto que se construye a lo largo del libro. Cada rama del repositorio corresponde a una de las siguientes FASES, que buscan presentar la implementación de funcionalidades específicas:  

## Fases de desarrollo

- **Fase 1**: operaciones **CRUD completas** (crear, listar, editar y eliminar) para la gestión de una librería.
- **Fase 2**: se realizan validaciones del lado del cliente (JavaScript) para los formularios de creación y edición.
- **Fase 3**: se agrega funcionalidad para consumir datos de API externa (https://www.datos.gov.co/resource/577f-9ckm.json). También se realiza gráfica utilizando la libería Plotly (https://plotly.com/javascript/).
- **Fase 4**: se agrega lo relacionado con autenticación y gestión de roles. 
- **Fase 5**: se agrega funcionalidad para carga de datos desde excel. Para el ejemplo se cargan autores.
- **Fase 6**: se agrega funcionalidad para generar reportes en excel y pdf.

## Funcionalidades

- **Categorías**: administración de las categorías de libros (nombre y descripción).
- **Autores**: administración de autores (nombre, nacionalidad y fecha de nacimiento).
- **Libros**: administración de libros (título, año de publicación, descripción y categoría), con asignación de uno o varios autores.
- **Datos Externos**: consume datos de una API externa y los grafica.

## Tecnologías

- PHP 8.1 o superior
- Laravel 10
- MySQL
- Blade + Bootstrap 5 (vía CDN)
- Composer

## Instalación

1. Clonar el repositorio:

   ```bash
   git clone <url-del-repositorio>
   cd libreria_mdt
   ```

2. Instalar las dependencias de PHP:

   ```bash
   composer install
   ```

3. Crear el archivo de entorno y generar la clave de la aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Crear una base de datos en MySQL y configurar las credenciales en `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=libreria_mdt
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

6. Iniciar el servidor de desarrollo:

   ```bash
   php artisan serve
   ```

   La aplicación quedará disponible en <http://localhost:8000>.

## Rutas principales

| Ruta           | Descripción              |
|----------------|--------------------------|
| `/`            | Página de inicio         |
| `/categories`  | CRUD de categorías       |
| `/authors`     | CRUD de autores          |
| `/books`       | CRUD de libros           |

Las rutas se definen como recursos (`Route::resource`) en [routes/web.php](routes/web.php).

## Estructura relevante

```
app/
├── Http/Controllers/   # CategoryController, AuthorController, BookController
└── Models/             # Category, Author, Book, User
database/migrations/    # Migraciones de las tablas del proyecto
resources/views/        # Vistas Blade (layouts, categories, authors, books)
routes/web.php          # Definición de rutas
```

## Sobre el libro

Este proyecto acompaña al libro **_Desarrollo Web Paso a Paso_**, donde se explica de forma progresiva cómo construir la aplicación **Librería MDT**. Cada versión del repositorio refleja el estado del proyecto en una etapa del libro.

## Licencia

Proyecto con fines educativos. Laravel es software de código abierto bajo la [licencia MIT](https://opensource.org/licenses/MIT).
utores (nombre, nacionalidad y fecha de nacimiento).
- **Libros**: administración de libros (título, año de publicación, descripción y categoría), con asignación de uno o varios autores.

## Tecnologías

- PHP 8.1 o superior
- Laravel 10
- MySQL
- Blade + Bootstrap 5 (vía CDN)
- Composer

## Instalación

1. Clonar el repositorio:

   ```bash
   git clone <url-del-repositorio>
   cd libreria_mdt
   ```

2. Instalar las dependencias de PHP:

   ```bash
   composer install
   ```

3. Crear el archivo de entorno y generar la clave de la aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Crear una base de datos en MySQL y configurar las credenciales en `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=libreria_mdt
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

6. Iniciar el servidor de desarrollo:

   ```bash
   php artisan serve
   ```

   La aplicación quedará disponible en <http://localhost:8000>.

## Rutas principales

| Ruta           | Descripción              |
|----------------|--------------------------|
| `/`            | Página de inicio         |
| `/categories`  | CRUD de categorías       |
| `/authors`     | CRUD de autores          |
| `/books`       | CRUD de libros           |

Las rutas se definen como recursos (`Route::resource`) en [routes/web.php](routes/web.php).

## Estructura relevante

```
app/
├── Http/Controllers/   # CategoryController, AuthorController, BookController
└── Models/             # Category, Author, Book, User
database/migrations/    # Migraciones de las tablas del proyecto
resources/views/        # Vistas Blade (layouts, categories, authors, books)
routes/web.php          # Definición de rutas
```

## Sobre el libro

Este proyecto acompaña al libro **_Desarrollo Web Paso a Paso_**, donde se explica de forma progresiva cómo construir la aplicación **Librería MDT**. Cada versión del repositorio refleja el estado del proyecto en una etapa del libro.

## Licencia

Proyecto con fines educativos. Laravel es software de código abierto bajo la [licencia MIT](https://opensource.org/licenses/MIT).
utores (nombre, nacionalidad y fecha de nacimiento).
- **Libros**: administración de libros (título, año de publicación, descripción y categoría), con asignación de uno o varios autores.

## Tecnologías

- PHP 8.1 o superior
- Laravel 10
- MySQL
- Blade + Bootstrap 5 (vía CDN)
- Composer

## Instalación

1. Clonar el repositorio:

   ```bash
   git clone <url-del-repositorio>
   cd libreria_mdt
   ```

2. Instalar las dependencias de PHP:

   ```bash
   composer install
   ```

3. Crear el archivo de entorno y generar la clave de la aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Crear una base de datos en MySQL y configurar las credenciales en `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=libreria_mdt
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. Ejecutar las migraciones:

   ```bash
   php artisan migrate
   ```

6. Iniciar el servidor de desarrollo:

   ```bash
   php artisan serve
   ```

   La aplicación quedará disponible en <http://localhost:8000>.

## Rutas principales

| Ruta           | Descripción              |
|----------------|--------------------------|
| `/`            | Página de inicio         |
| `/categories`  | CRUD de categorías       |
| `/authors`     | CRUD de autores          |
| `/books`       | CRUD de libros           |

Las rutas se definen como recursos (`Route::resource`) en [routes/web.php](routes/web.php).

## Estructura relevante

```
app/
├── Http/Controllers/   # CategoryController, AuthorController, BookController
└── Models/             # Category, Author, Book, User
database/migrations/    # Migraciones de las tablas del proyecto
resources/views/        # Vistas Blade (layouts, categories, authors, books)
routes/web.php          # Definición de rutas
```

## Sobre el libro

Este proyecto acompaña al libro **_Desarrollo Web Paso a Paso_**, donde se explica de forma progresiva cómo construir la aplicación **Librería MDT**. Cada versión del repositorio refleja el estado del proyecto en una etapa del libro.

## Licencia

Proyecto con fines educativos. Laravel es software de código abierto bajo la [licencia MIT](https://opensource.org/licenses/MIT).