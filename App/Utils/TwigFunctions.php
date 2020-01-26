<?php

class TwigFunctions
{
    static $container;

    //nos permite tener disponible $container dentro de Twig:
    public static function setContainer(Psr\Container\ContainerInterface $container)
    {
        self::$container = $container;
    }
}
