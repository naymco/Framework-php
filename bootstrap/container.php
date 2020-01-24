<?php



// __DIR__ es una constante predefinida en PHP con el valor del directorio actual:
require __DIR__ . "/../vendor/autoload.php";

//Creamos una instancia del contenedor PHP-DI:
$containerBuilder = new \DI\ContainerBuilder;

//Utilizamos Kint para mostrar el contenido de la clase en pantalla:
Kint::dump($containerBuilder);

//Ponemos la variable Autowiring a False:
$containerBuilder->useAutowiring(false);

//Añadimos al contenedor las definiciones de configuración que tendremos en //config.php:
$containerBuilder->addDefinitions(__DIR__ . '/../bootstrap/config.php');

//Ahora creamos la instancia de la clase containerBuilder:
$container = $containerBuilder->build();
    return $container;

$containerBuilder->addDefinitions(base_path('bootstrap/config.php'));
$containerBuilder->useAutowiring(true);