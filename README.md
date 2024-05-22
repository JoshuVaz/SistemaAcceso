
# Sistema de acceso
Este es un sistema web para un sistema de accesos por medio de tarjeta, el cual permite registrar tarjetas, registrar usuarios, y tener un control de los accesos que hay.

Este sistema esta en php sin usar ningun framework, se usa el MVC (Modelo Vista Controlador), y se usa bootstrap para manejar el frontend, al igual que MySQL para la base de datos
 



## Instalación

Para poder correr el proyecto necesitas tener instalado lo siguiente:

- [XAMMP](https://www.apachefriends.org/es/index.html)

> [!NOTE]
> Recuerda usar la base de datos proporcionada en la base de datos de XAMMP para que puedas acceder, la base de datos es: accesoexterno.sql
## Despliegue

Para hacer el despliegue solo debes clonar el repositorio y colocarlo en la carpeta htdocs de XAMMP y seguir la ruta de tu localhost para poder ingresar.

Ejemplo: http://localhost/SistemaAcceso

## Configurar Base de Datos

Para conectarte a la base de datos necesitas ir a ./modelos/conexion.php y sustituir los valores como son el nombre de la base de datos, tu usuario y tu contraseña

```bash 
$link = new PDO(
			"mysql:host=localhost;dbname="nombre_base_datos";charset=utf8mb4",
			"tu_usuario",
			"tu_contrasena"
		);

```

- Ejemplo

```bash 
$link = new PDO(
			"mysql:host=localhost;dbname=accesoexterno;charset=utf8mb4",
			"root",
			""
		);

```

## Correr en Local

Para correr el sistema en local solo hay que activar XAMMP en la parte de Apache y MySQL y con eso ya tendras el sistema listo



## Extra



Puedes ingresar con los siguientes datos:

Usuario administrador

- Usuario: admin
- Contraseña: joshua123

Usuario normal

- Usuario: joshuavazquez
- Contraseña: joshua123

