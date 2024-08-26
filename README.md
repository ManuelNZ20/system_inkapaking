# Sistema de gestión por Área

## Desarrollo

#### Requerimientos

- El sistema permite a los usuarios registrarse e iniciar sesión con un correo o nombre de usuario, y una contraseña.
- El sistema almacena las solicitudes de pedidos de los usuario por área.
- El usuario registra los pedidos de desayuno, almuerzo, o cena, y el encargado la pueda conocer.
  - El encargado recibe las solicitudes generadas por todas las áreas.
  - El encargado puede listar las solicitudes por área de los platos.
  - El encargado debe conocer los platos de comida que debe preparar por área.

#### Lenguajes de programación 🚀

- PHP
- JavaScript

#### Tecnologías WEB 🌐

- HTML
- CSS
- jQuery

#### Base de datos 💾🌐

- MySQL

#### Patrón de arquitectura de software

- MVC

#### Servicios de terceros🤝

- Heroku (Alojamiento de la aplicación Web)
- CleverCloud (Alojamiento de la base de datos)
- Git & GitHub (Controlador de versiones y alojamiento de proyecto)

#### Paquetes de composer

- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv): Permite la carga de variable de entorno
  - Instalación
  ```
    composer require vlucas/phpdotenv
  ```

### PASOS PARA INICIAR CONEXIÓN CON HEROKU

```
heroku login
```

- Iniciar servicio en el sistema
  ```
  heroku config --app <system-name>
  ```
