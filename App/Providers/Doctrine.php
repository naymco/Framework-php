<?php

namespace Application\Providers;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use Psr\Container\ContainerInterface;

class Doctrine
{
    //declaramos una variable pública Entity Manager, que nos permitirá acceder a una tabla de la BD
    public $em;

    /** @noinspection PhpDeprecationInspection */
    public function __construct(ContainerInterface $container)
    {
        //variable para guardar la conexión a la base de datos con la función de config.php
        $dbconfig = $container->get('config.database');
        \Kint::dump($dbconfig);

        //Definimos en una variable la ruta a los modelos de datos:
        $paths = [
            base_path('app/Models/Entities'),
            base_path('app/Models/Repositories')
        ];

        //variable para definir si estamos en modo desarrollo:
        $isDevMode = true;
        //configuración de Doctrine. rutas permitidas, modo dev, dir proxy, cache, anotación simple:
        $config = Setup::createAnnotationMetadataConfiguration(
            $paths, $isDevMode, null, null, false
        );

        AnnotationRegistry::registerLoader('class_exists');
        //Creamos el Entity Manager con los datos de config de la BD y la config del ORM

        $this->em = EntityManager::create($dbconfig, $config);
    }
}