
# Proyecto Monorepo de Laravel y Angular

Este repositorio contiene un **backend en Laravel** y un **frontend en Angular** bajo una estructura de monorepo.

## Estructura del Proyecto

```
/capi-examn
    ├── backend/
    ├── frontend/
    └── ...
```

### Backend: Laravel

El backend de este proyecto está desarrollado usando [Laravel](https://laravel.com/), un framework de PHP.

#### Requisitos Previos

- PHP >= 8.x
- Composer
- MySQL u otra base de datos compatible

#### Instrucciones de Configuración

1. **Instalar dependencias:**

   Ejecuta el siguiente comando en la raíz del proyecto Laravel:
   ```bash
   composer install
   ```

2. **Configurar el archivo `.env`:**

   Copia el archivo de ejemplo `.env` y actualiza la configuración de la base de datos y otras configuraciones necesarias:
   ```bash
   cp .env.example .env
   ```

   Luego, genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

3. **Ejecutar las migraciones de la base de datos:**

   Ejecuta las migraciones para configurar el esquema de la base de datos:
   ```bash
   php artisan migrate
   ```

4. **Iniciar el servidor de desarrollo de Laravel:**

   ```bash
   php artisan serve
   ```

   El servidor estará ejecutándose en `http://127.0.0.1:8000`.

### Frontend: Angular

El frontend está desarrollado usando [Angular](https://angular.io/).

#### Requisitos Previos

- Node.js >= 16.x
- Angular CLI >= 14.x

#### Instrucciones de Configuración

1. **Navegar al directorio `frontend `:**

   ```bash
   cd frontend
   ```

2. **Instalar dependencias:**

   Ejecuta el siguiente comando en la carpeta del proyecto Angular:
   ```bash
   npm install
   ```

3. **Iniciar el servidor de desarrollo de Angular:**

   ```bash
   ng serve
   ```

   La aplicación Angular estará ejecutándose en `http://localhost:4200`.

## Uso

- Accede al API de Laravel en `http://127.0.0.1:8000/api/...`.
- Accede al frontend de Angular en `http://localhost:4200`.

### Variables de Entorno

Tanto el backend como el frontend necesitan sus respectivas variables de entorno configuradas, como:

#### Laravel

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_crud_contactos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```
