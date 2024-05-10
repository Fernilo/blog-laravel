# Blog en laravel

El proyecto es un administrador de post con login y privilegios de usuarios. Cuenta con una sección pública para la visualización de los posts que tienen etiquetas y categorías. Se puede realizar una búsqueda de posts mediante un buscador dinámico. Además cuenta con una sección de Administradores en el cual se gestionan los posts, categorías, usuarios, etiquetas y permisos.

## Tech Stack
[<img src="https://img.shields.io/badge/composer-2-blue?logoColor=black&logo=Composer&labelColor=white">](<LINK>)
[<img src="https://img.shields.io/badge/Laravel-8-blue?logo=laravel&labelColor=white">](<LINK>)
[<img src="https://img.shields.io/badge/Mysql-8.0-blue?logo=mysql&labelColor=white">](<LINK>)
[<img src="https://img.shields.io/badge/Sail-8-blue?logo=laravel&labelColor=white">](<LINK>)
[<img src="https://img.shields.io/badge/Javascript-blue?logo=javascript&labelColor=white">](<LINK>)

## Capturas
 incluir imágenes
## Instalación

El proyecto se puede levantar mediante [Sail](https://laravel.com/docs/8.x/sail). Comandos:

```bash
   git clone git@github.com:Fernilo/blog-laravel.git

   cd blog-laravel

   composer install

   cp .env.example .env

   sail up -d

   sail artisan migrate --seed

   sail artisan key:generate
```

## Autores

| [<img src="https://avatars.githubusercontent.com/u/99487654?v=4" width=115><br><sub>Fernando Mercado - Dev. Backend</sub>](https://github.com/Fernilo) |
| :---: | 

## Contribuciones
Si deseas contribuir a este proyecto, por favor sigue estos pasos:

1. Haz un fork del proyecto.
2. Crea una nueva rama (git checkout -b feature/nueva-caracteristica).
3. Haz tus cambios y commitealos (git commit -am 'Agrega una nueva característica').
4. Sube tus cambios (git push origin feature/nueva-caracteristica).
5. Abre una solicitud de extracción.

## Estado del proyecto

En desarrollo