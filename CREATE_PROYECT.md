### Nota de instalación

1) Instalar symfony para App
2) Actualizar .env para la url de la BBDD
3) Instalar doctrine y anotaciones:
   composer require symfony/orm-pack
   composer require --dev symfony/maker-bundle
   php bin/console doctrine:database:create

   Crear la entidad manualmente en la carpeta que le corresponda y añadir las anotaciones de doctrine
   para los atributos

   Genera el php para crear la tabla
   php bin/console make:migration
   Crea la tabla en la BBDD
   php bin/console doctrine:migrations:migrate

   Para consultas desde la línea de comando pe: php bin/console dbal:run-sql 'SELECT * FROM product

4) Instalar tactician
   Añadir en services.yaml

   # default configuration for services in *this* file
   _defaults:
   autowire: true      # Automatically injects dependencies in your services.
   autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
   public: false
   bind:
   $commandBus: '@tactician.commandbus.command'
   _instanceof:
   App\Application\Command\CommandHandlerInterface:
   public: true
   tags:
   - { name: tactician.handler, typehints: true, bus: command }

   Si usas tambien commandQuery y commandEvents quedaría como sigue:

       # default configuration for services in *this* file
   _defaults:
   autowire: true      # Automatically injects dependencies in your services.
   autoconfigure: true # Automatically registers your services as commands, event subscribers, etc.
   public: false
   bind:
   $appId: '%app.id%'
   $queryBus: '@tactician.commandbus.query'
   $commandBus: '@tactician.commandbus.command'
   $alfrescoClient: '@alfresco_service.client'

   En la etiqueta de App\: actualizala como queda:

        App\:
        resource: '../src/*'
        exclude:
            #- '../src/DependencyInjection/'
            #- '../src/Entity/'
            - '../src/Kernel.php'
            - '../src/Infrastructure/Share/Repository'


    Crea el fichero config/packages/league_tactician.yaml y añade

# Library documentation: http://tactician.thephpleague.com/
# Bundle documentation: https://github.com/thephpleague/tactician-bundle/blob/v1.0/README.md
tactician:
default_bus: command
method_inflector: tactician.handler.method_name_inflector.invoke
commandbus:
command:
middleware:
- tactician.commandbus.command.middleware.command_handler

	Si usas tambien commandQuery y commandEvents quedaría como sigue:

# Library documentation: http://tactician.thephpleague.com/
# Bundle documentation: https://github.com/thephpleague/tactician-bundle/blob/v1.0/README.md
tactician:
default_bus: command
method_inflector: tactician.handler.method_name_inflector.invoke
commandbus:
query:
middleware:
- tactician.commandbus.query.middleware.command_handler
command:
middleware:
#                - app.event.bus.middleware.event_dispatcher
                - tactician.middleware.locking
                - tactician.middleware.doctrine
                #                - app.event.bus.middleware.event_publisher
#                - app.event.bus.middleware.event_store
                - tactician.commandbus.command.middleware.command_handler

5) Añade en composer.json

"league/tactician": "^1.1",
"league/tactician-bundle": "^1.1",

Si usas tambien commandQuery y commandEvents además tendrías que añadir

"league/tactician-doctrine": "^1.1",

Una vez hecho esto hacer composer update.

## TEST

1) - composer require --dev symfony/test-pack

### Datos prueba

1) Actualizar .env.tst con la url de la BBDD
2) - php bin/console --env=test doctrine:database:create
3) - php bin/console --env=test doctrine:schema:create
4) Las pruebas deben ser independientes entre sí para evitar efectos secundarios. Por ejemplo, si alguna prueba modifica la base de datos (agregando o quitando una entidad) podría cambiar los resultados de otras pruebas.

DAMADoctrineTestBundle usa transacciones de Doctrine para permitir que cada prueba interactúe con una base de datos no modificada. Instálalo usando:
- composer require --dev dama/doctrine-test-bundle

Ahora, habilítelo como una extensión de PHPUnit:

<!-- phpunit.xml.dist -->
<phpunit>
    <!-- ... -->

    <extensions>
        <extension class="DAMA\DoctrineTestBundle\PHPUnit\PHPUnitExtension"/>
    </extensions>
</phpunit>

ver más https://github.com/dmaicher/doctrine-test-bundle

### Cargar datos de prueba

1) - composer require --dev doctrine/doctrine-fixtures-bundle
2) generar una entidad vacia para pruebas con el sufijo Fxture pe:

- php bin/console make:fixtures

Luego para llenarla usar la clase del repositorio, la entidad y llenarla.

3) - php bin/console --env=test doctrine:fixtures:load
