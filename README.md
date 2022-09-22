# Architecture Overview

Ejemplo de Implementación de una ApiRes que crea un usuario. Se parte de la base de que el lector tiene un nivel alto de programación y conoce Symfony 5 con cierta profundidad

## Infrastructure Stack

- PHP 7.4
- MySql 8.0.21
- Apache 2.4

?> **Adminer DB access**  
<http://localhost:8080>
```
Server: MySQL (127.0.0.1 via TCP/IP)
User: root
Password:
```

## Domain Driven Design and Hexagonal Architecture
A continuación, se explicarán los conceptos fundamentales de cómo diseñar una aplicación usando este framework, principios que son recomendables de seguir, aunque no obligatorios.

![build structure](assets/img/clean-architecture.png)

### The folder structure
El diseño de la aplicación deberá seguir las recomendaciones de la arquitectura **hexagonal** mediante tres capas principales, aplicación, dominio e infraestructura. Y dos capas auxiliares, para utilidades y puntos de acceso.

```
├─ Application
├─ Domain
├─ Infrastructure
└─ Controller
```

El diseño estará repartido en:

> **Application**:   
Contendrá los comandos, handlers, cuyo objetivo es convertir peticiones externas, en peticiones a tu capa de dominio.  
``` >> Sólo puede usar clases de la capa de dominio.```

> **Domain**:   
Contendrá la lógica de negocio repartida en modelos y servicios de dominio.
``` >> Es totalmente independiente, y no conoce a nada que esté fuera (excepto utilidades).```

> **Infrastructure**:   
Contendrá la implementación en tecnologías o servicios externos concretos de las dependencias de tu capa de dominio, como por ejemplo, los repositorios (para mongo, mysql, postgresql, etc).
``` >> Gestiona el problema de la inyección de dependencias con recursos como los contenedores de dependencias, el cual se encargará de inyectar las instancias de infrastructura a servicios de dominio; y éstos, a los de aplicación.```

> **Controller**:   
Estarán todos los puntos de acceso a los servicios de tu aplicación, como pueden ser comandos de consola, y controladores para peticiones vía API HTTP, etc.  
``` >> Sólo puede usar clases de la capa de aplicación.```

# Usage

> **Descargar de git desde la consola**:
https://github.com/ipalomon/ddd-symfony5.git

> **ir al directorio del proyecto e instalar dependencias**:
composer install