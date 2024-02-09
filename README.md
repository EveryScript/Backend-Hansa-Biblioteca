# HANSA LIBROS

Este proyecto esta desarrollado con Laravel y funciona como backend de una aplicacion web desarrollada con React




## Instrucciones principales

Antes que nada usar algun sevidor local para usar el proyecto despues de haberlo clonado

- phpMyAdmin
- Laragon (usado para el desarrollo)
- Instalar composer


## Configuracion del proyecto

Algunas comandos utilizados son:

```bash
  composer update
```
Para settear los valores de la base de datos crear un archivo `.env` en base al archivo .env.example. Luego utilizar el siguiente comando para generar una `API_KEY` del proyecto de manera local:
```bash
  php artisan key:generate
```
Ahora crear una base de datos con el nombre adecuado y agregar el nombre en el archivo `.env` y despues ejecutar el siguiente comando para llenar la base de datos correctamente
```bash
  php artisan migrate:fresh --seed
```
### Funcionamiento de Backend
Usar el comando `php artisan serve` para que el proyecto reciba peticiones HTTP mediante cualquier cliente REST mediante la URL `http://127.0.0.1:8000/api `
Usar las cabeceras `Content-Type: application/json` y `Accept: application/json` en el cliente rest para hacer peticiones a la URL anterior





## Autor

- Ing. Ever Quispe Ticona
- [GitHub](https://github.com/EveryScript)
- [WhatsApp](https://github.com/EveryScript)



## Proyectos desarrollados

- Sitio Web para la  [Consultora Multidisciplinaria Quimeras Bolivia](https://www.quimerasbolivia.com)

